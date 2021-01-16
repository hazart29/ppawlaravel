<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Jadwal Pengajar
    </h2>
</x-slot>

<div class="py-14">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <table class="table table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class=" py-1">Kelas</th>
                                <th class=" py-1">Kode MK</th>
                                <th class=" py-1">NIP</th>
                                <th class=" py-1">Hari</th>
                                <th class=" py-1">Pukul</th>
                                <th class=" py-1">Ruang</th>
                                <th class=" py-1">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kuliah as $row)
                            <tr>
                                <td class=" py-1">{{ $row->kelas }}</td>
                                <td class=" py-1">{{ $row->kode_mk }}</td>
                                <td class=" py-1">{{ $row->nip }}</td>
                                <td class=" py-1">{{ $row->hari }}</td>
                                <td class=" py-1">{{ $row->pukul }}</td>
                                <td class=" py-1">{{ $row->ruang }}</td>
                                <td class=" py-1" align="right">
                                    <button wire:click="detail({{ $row->id }})" class="text-blue-500 hover:text-blue-700 bg-white font-bold py-2 px-4 rounded">
                                        Detail
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="6">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <table class="table table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th class=" py-1">NIM</th>
                                <th class=" py-1">Kode MK</th>
                                <th class=" py-1">kelas</th>
                                <th class=" py-1">presensi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $row)
                            <tr>
                                <td class=" py-1">{{ $row->nim }}</td>
                                <td class=" py-1">{{ $row->kode_mk }}</td>
                                <td class=" py-1">{{ $row->kelas }}</td>
                                <td class=" py-1">{{ $row->presensi }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="6">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
