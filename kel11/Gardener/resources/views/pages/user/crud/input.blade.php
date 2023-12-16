<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/products.html">
                <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Detail</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Project</label>
                                            <input type="text" name="project" id="project" class="form-control mb-2" placeholder="Project" value="{{$crud->project}}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control mb-2" placeholder="Keterangan" value="{{$crud->keterangan}}" />
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Status</label>
                                            <select class="form-select mb-2" id="status" name="status">
                                                <option value="">-- Status --</option>
                                                <option value="Selesai" {{$crud->status=="Selesai" ? 'selected' : ''}}>Selesai</option>
                                                <option value="Tidak Selesai"  {{$crud->status=="Tidak Selesai" ? 'selected' : ''}}>Tidak Selesai</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" onclick="load_list(1);" class="btn btn-light me-5">Kembali</button>
                        @if ($crud->id)
                        <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#kt_ecommerce_add_product_form','{{route('crud.update',$crud->id)}}','PATCH');" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                        @else
                            <button type="submit" id="kt_ecommerce_add_product_submit"  onclick="handle_upload('#kt_ecommerce_add_product_submit','#kt_ecommerce_add_product_form','{{route('crud.store')}}','POST');" class="btn btn-primary">
                                <span class="indicator-label">Save Changes</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#kt_datepicker_1").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
    $("#kt_datepicker_2").flatpickr({
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
</script>
