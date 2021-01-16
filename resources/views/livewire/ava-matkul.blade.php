<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Informasi MataKuliah Yang Tersedia
    </h2>
</x-slot>

<div class="py-14">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-4">
            <div class="grid-initia">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <table class="table table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th colspan="7">Informasi MataKuliah : </th>
                            </tr>
                            <tr class="bg-gray-100 text-left">
                                <th class=" py-1">Kode MK</th>
                                <th class=" py-1">Nama MK</th>
                                <th class=" py-1">SKS</th>
                                <th class=" py-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($matkul as $row)
                            <tr>
                                <td class=" py-1">{{ $row->kode_mk }}</td>
                                <td class=" py-1">{{ $row->nama_mk }}</td>
                                <td class=" py-1">{{ $row->sks }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="3">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="pt-4" colspan="3">{{ $matkul->links() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <table class="table table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th colspan="7">Informasi Kelas : </th>
                            </tr>
                            <tr class="bg-gray-100 text-left">
                                <th class=" py-1">Kelas</th>
                                <th class=" py-1">Kode MK</th>
                                <th class=" py-1">NIP</th>
                                <th class=" py-1">Hari</th>
                                <th class=" py-1">Pukul</th>
                                <th class=" py-1">Ruang</th>
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
                            </tr>
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="6">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="pt-4" colspan="6">{{ $kuliah->links() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <table class="table table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100 text-left">
                                <th colspan="7">Informasi Dosen : </th>
                            </tr>
                            <tr class="bg-gray-100 text-left">
                                <th class=" py-1">nip</th>
                                <th class=" py-1">Nama Dosen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dosen as $row)
                            <tr>
                                <td class=" py-1">{{ $row->nip }}</td>
                                <td class=" py-1">{{ $row->name }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="border px-4 py-2 text-center" colspan="2">Tidak ada data</td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="pt-4" colspan="2">{{ $dosen->links() }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
