<div class="table-responsive">
    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
        <thead>
            <tr class="fw-bolder text-muted">
                <th class="max-w-150px">No</th>
                <th class="max-w-150px">Project</th>
                <th class="max-w-150px">Keterangan</th>
                <th class="max-w-100px">Status</th>
                @if(Auth::user()->level != "user")
                <th class="max-w-100px">Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($collection as $i => $item)
            <tr>
                <td>
                    {{$i+1}}
                </td>
                <td>
                    <span class="fw-bolder text-dark">{{ $item->project }}</span>
                </td>
                <td class="text pe-0">
                    <span class="fw-bolder text-dark">{{ $item->keterangan }}</span>
                </td>
                <td class="text pe-0">
                    <span class="fw-bolder text-dark">{{ $item->status }}</span>
                </td>
                @if(Auth::user()->level != "user")
                <td class="pe-0">
                    <div class="btn-group" role="group">
                        <button id="aksi" type="button" class="btn btn-sm btn-light btn-active-light-primary" data-bs-toggle="dropdown" aria-expanded="false">
                            Aksi
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                </svg>
                            </span>
                        </button>
                        <div class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" aria-labelledby="aksi">
                            <div class="menu-item px-3">
                                <a href="javascript:;" onclick="load_input('{{route('crud.edit',$item->id)}}');" class="menu-link px-3">Ubah</a>
                            </div>
                            <div class="menu-item px-3">
                                <a href="javascript:;" onclick="handle_delete('{{route('crud.destroy',$item->id)}}');" class="menu-link px-3">Hapus</a>
                            </div>
                        </div>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $collection->links('theme.web.pagination') }}