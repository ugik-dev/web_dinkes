<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
<section class="blog-page-wrap blog-one left-sidebar-blog pt-3">
    <div class="container mb-2">
        <div class="ibox-content">
            <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <select class="form-control mr-sm-2" name="id_ref" id="id_ref"></select>
                <select class="form-control mr-sm-2" name="tahun" id="tahun">
                    <option value="">Semua Tahun</option>
                    <option value="2022">2022</option>
                    <option value="2021">2021</option>

                </select>
            </form>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table id="FDataTable" class="table table-bordered table-hover" style="padding:0px">
                                <thead>
                                    <tr>
                                        <th style="width: 7%; text-align:center!important">ID</th>
                                        <th style="width: 24%; text-align:center!important">Nama</th>
                                        <th style="width: 24%; text-align:center!important">Jenis</th>
                                        <th style="width: 1%; text-align:center!important">Tahun</th>
                                        <th style="width: 5%; text-align:center!important">Kategori</th>
                                        <th style="width: 5%; text-align:center!important">Total Download</th>
                                        <th style="width: 13%; text-align:center!important">Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('#bank_data').addClass('active');

        var toolbar = {
            'form': $('#toolbar_form'),
            'id_ref': $('#toolbar_form').find('#id_ref'),
            'tahun': $('#toolbar_form').find('#tahun'),
        }

        var FDataTable = $('#FDataTable').DataTable({
            'columnDefs': [],
            deferRender: true,
            "order": [
                [0, "desc"]
            ]
        });

        var UserModal = {
            'self': $('#bank_data_modal'),
            'info': $('#bank_data_modal').find('.info'),
            'form': $('#bank_data_modal').find('#bank_data_form'),
            'addBtn': $('#bank_data_modal').find('#add_btn'),
            'saveEditBtn': $('#bank_data_modal').find('#save_edit_btn'),
            'idUser': $('#bank_data_modal').find('#id_bank_data'),
            'nama_bank_data': $('#bank_data_modal').find('#nama_bank_data'),
            'path_bank_data': $('#bank_data_modal').find('#path_bank_data'),
            'bank_url': $('#bank_data_modal').find('#bank_url'),
            'id_ref': $('#bank_data_modal').find('#id_ref'),
            'bank_jenis': $('#bank_data_modal').find('#bank_jenis'),
            'opd': $('#bank_data_modal').find('#opd'),
        }

        var dataRole = {}
        var dataUser = {}


        $.when(getAllRole(), getAllUser()).then((e) => {
            // toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });

        function getAllRole() {
            return $.ajax({
                url: `<?php echo site_url('ParameterController/getAllRefBankData/') ?>`,
                'type': 'get',
                data: {},
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataRole = json['data'];
                    renderRoleSelectionFilter(dataRole);
                },
                error: function(e) {}
            });
        }

        function renderRoleSelectionFilter(data) {
            toolbar.id_ref.empty();
            toolbar.id_ref.append($('<option>', {
                value: "",
                text: "-- Semua Kategori --"
            }));
            Object.values(data).forEach((d) => {
                toolbar.id_ref.append($('<option>', {
                    value: d['id_ref_bank_data'],
                    text: d['id_ref_bank_data'] + ' :: ' + d['nama_ref'],
                }));
            });
        }




        toolbar.id_ref.on('change', (e) => {
            // UserModal.id_ref.attr('readonly', !empty(toolbar.id_ref.val()));
            getAllUser();
        });
        toolbar.tahun.on('change', (e) => {
            // UserModal.id_ref.attr('readonly', !empty(toolbar.id_ref.val()));
            getAllUser();
        });

        function getAllUser() {

            return $.ajax({
                url: `<?php echo site_url('BankDataController/getAllBankData/') ?>`,
                'type': 'get',
                data: toolbar.form.serialize(),
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataUser = json['data'];
                    renderUser(dataUser);
                },
                error: function(e) {}
            });
        }

        function renderUser(data) {
            if (data == null || typeof data != "object") {
                console.log("User::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((bank_data) => {
                var lihat = `
        <a class="btn btn-light" target="_blank" href='<?= base_url('bank-data/download/') ?>${bank_data['id_bank_data']}'><i class='fa fa-download'></i> Download</a>
      `;


                renderData.push([bank_data['id_bank_data'], bank_data['nama_bank_data'], bank_data['bank_jenis'] == 1 ? "file " + bank_data['path_bank_data'].split('.').pop() : 'Url', bank_data['tahun'], bank_data['nama_ref'], bank_data['total_download'], lihat]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }


    });
</script>