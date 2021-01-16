<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Request Kuliah Mahsiswa
    </h2>
</x-slot>

<div class="py-14">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-4">
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
                                <th class="py-1">NIM</th>
                                <th class=" py-1">Kode MK</th>
                                <th class=" py-1">Nama MK</th>
                                <th class=" py-1">Kelas</th>
                                <th class=" py-1">Hari</th>
                                <th class=" py-1">Pukul</th>
                                <th class=" py-1">Ruang</th>
                                <th class=" py-1">SKS</th>
                                <th class=" py-1">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($val_dataKrs as $row)
                            <tr>
                                <td class=" py-1">{{ $row->nim }}</td>
                                <td class=" py-1">{{ $row->kode_mk }}</td>
                                <td class=" py-1">{{ $row->nama_mk }}</td>
                                <td class=" py-1">{{ $row->kelas }}</td>
                                <td class=" py-1">{{ $row->hari }}</td>
                                <td class=" py-1">{{ $row->pukul }}</td>
                                <td class=" py-1">{{ $row->ruang }}</td>
                                <td class=" py-1">{{ $row->sks }}</td>
                                <td class=" py-1" align="right">
                                    @if($row->status == "belum_disetujui")
                                    <button wire:click="approve({{ $row->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                            <path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1 0 13.5 8a.5.5 0 0 1 1 0 6.5 6.5 0 1 1-3.25-5.63.5.5 0 1 1-.5.865A5.472 5.472 0 0 0 8 2.5z" />
                                        </svg>
                                    </button>
                                    @else
                                    {{ $row->status }}
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="8">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div>

            </div>
        </div>
    </div>
</div>
