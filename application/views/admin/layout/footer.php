    </div>
  </div>
</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>document.write(new Date().getFullYear())</script> &copy; BurgerGuns Cloth by <a href="">Lula</a> 
            </div>
        </div>
    </div>
</footer>

</div>
</div>

        <script src="<?=base_url('assets/template/dist/')?>assets/js/vendor.min.js"></script>

        <script src="<?=base_url('assets/template/dist/')?>assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/select2/js/select2.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/quill/quill.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/dropzone/min/dropzone.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/dropify/js/dropify.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/toastr/build/toastr.min.js"></script>

        <!-- knob plugin -->
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/jquery-knob/jquery.knob.min.js"></script>

        <!-- third party js -->
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <!-- third party js ends -->
        
        <!-- Init js-->
        <script src="<?=base_url('assets/template/dist/')?>assets/js/pages/form-advanced.init.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/js/pages/form-quilljs.init.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/js/pages/form-fileuploads.init.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/js/pages/toastr.init.js"></script>
        <script src="<?=base_url('assets/template/dist/')?>assets/js/pages/datatables.init.js"></script>
        
        <!-- App js-->
        <script src="<?=base_url('assets/template/dist/')?>assets/js/app.min.js"></script>
        
        <script>
          $(document).ready(function () {
            basePrefURL = '<?php echo base_url('admin/kategori/edit') ?>'
            
            $('#example').DataTable({
            lengthMenu: [[5, 10, 100], [20, 50, 100]],
            processing: true,
            serverSide: true,
            ajax: {
              url: '<?php echo base_url('admin/kategori/ajaxAllData') ?>',
              type: 'POST'
            },
            columnDefs: [
              {"className": "dt-center", "targets": "_all"}
            ],
            columns: [
              {
                  data: "no",
                  render: function (data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                  },
                  width: "10%"
              },
              {
                data: 'category_name',
                name: 'data.category_name',
                width: "60%"
              },
              {
                data: 'category_id',
                name: 'data.category_id',
                searchable: false,
                orderable: false,
                render: function(data, type, row) {
                  var strAction = `
                  <a href="`+basePrefURL+`/`+data+`" class="btn btn-success btn-sm"><b>Edit</b></a>
                  <button class="btn btn-danger btn-sm" id="deleteCategory" onclick="deleteCategory(`+data+`)"><b>Hapus</b></button>
                    `;
                  return strAction;
                },
                width: "30%"
              }
              
            ],
            order: [
              [1, 'desc']
            ]
          });
        });

          <?php if ($this->session->flashdata('sukses')) { ?>
            setTimeout(() => {
              Swal.fire({
                icon: 'success',
                text: '<?php echo $this->session->flashdata('sukses'); ?>',
              });
            },1000);
          <?php } ?>

          <?php if ($this->session->flashdata('warning')) { ?>
            setTimeout(() => {
              Swal.fire({
                icon: 'error',
                text: '<?php echo $this->session->flashdata('warning'); ?>'
              });
            },1000);
          <?php } ?>

          function deleteCategory(id) {
            basePrefURLDelete = '<?php echo base_url('admin/kategori/delete') ?>'
            Swal.fire({
              title: '<strong>Yakin ingin menghapus ?</strong>',
              icon: 'warning',
              showCloseButton: true,
              showCancelButton: true,
              focusConfirm: false,
              reverseButtons: true,
              focusCancel: true,
              confirmButtonColor: '#e1c811',
              cancelButtonText:`Cancel`,
              confirmButtonText:`Delete`
            }).then((result) => {
              if (result.value) {
                window.location.href = basePrefURLDelete+`/`+id
              }
            }); 
          };
        </script>
        
    </body>
</html>