<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Data Kegiatan Kuliah
    </h2>
</x-slot>

<div class="py-14">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
		<div class="grid grid-cols-2 gap-4">
  			<div>
  				<div class="">
  					<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                        <div class="mb-4">
                            <label for="formKodeKL" class="block text-gray-700 text-sm font-bold mb-2">Kelas :</label>
                            <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formKodeKL" wire:model="kelas">
                            @error('kelas') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formKodeMK" class="block text-gray-700 text-sm font-bold mb-2">Kode Matkul :</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formKodeMK" wire:model="kode_mk">
                            @error('kode_mk') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formNIP" class="block text-gray-700 text-sm font-bold mb-2">nip :</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formNIP" wire:model="nip">
                            @error('nip') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
						<div class="mb-4">
                            <label for="formHari" class="block text-gray-700 text-sm font-bold mb-2">Hari :</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formHari" wire:model="hari">
                            @error('hari') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formPukul" class="block text-gray-700 text-sm font-bold mb-2">Pukul :</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formPukul" wire:model="pukul">
                            @error('pukul') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-4">
                            <label for="formRuang" class="block text-gray-700 text-sm font-bold mb-2">Ruang :</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="formRuang" wire:model="ruang">
                            @error('ruang') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        <button wire:click="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Save
                        </button>
                    </span>
                </div>
            </div>
  			<div>
  				<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
					@if (session()->has('message'))
					<div class="bg-green-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
						<div class="flex">
							<div>
								<p class="text-sm">{{ session('message') }}</p>
							</div>
						</div>
					</div>
					@endif

					<table class="table table-striped w-full">
						<thead>
							<tr class="bg-gray-100 text-left">
								<th class=" py-1">Kelas</th>
								<th class=" py-1">Kode MK</th>
								<th class=" py-1">NIP</th>
								<th class=" py-1">Hari</th>
								<th class=" py-1">Pukul</th>
								<th class=" py-1">Ruang</th>
								<th class=" py-1"></th>
							</tr>
						</thead>
						<tbody>
							@forelse($val_dataKuliah as $row)
							<tr>
								<td class=" py-1">{{ $row->kelas }}</td>
								<td class=" py-1">{{ $row->kode_mk }}</td>
								<td class=" py-1">{{ $row->nip }}</td>
								<td class=" py-1">{{ $row->hari }}</td>
								<td class=" py-1">{{ $row->pukul }}</td>
								<td class=" py-1">{{ $row->ruang }}</td>
								<td class=" py-1" align="right">
		                            <button wire:click="edit({{ $row->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
		                            	<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  											<path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
										</svg>
		                            </button>
		                            <button wire:click="delete({{ $row->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
		                            	<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
										 	<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
										</svg>
		                            </button>
                        		</td>
							</tr>
							@empty
							<tr>
								<td class="border px-4 py-2 text-center" colspan="7">Tidak ada data</td>
							</tr>
							@endforelse
						</tbody>
						<tfoot>
							<tr>
								<td class="pt-4" colspan="7">{{ $val_dataKuliah->links() }}</td>
							</tr>
						</tfoot>
					</table>
				</div>
  			</div>
		</div>
	</div>
</div>
