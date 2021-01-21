<?php $title = 'How to Import a CSV File in PHP'; ?>
<?php require 'header.php'; ?>

<!-- Content Start -->

<?php
    require 'csv-importer.php';
    require 'generate-html.php';
?>

<div class="row">
    <div class="col-4">
        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="input-group mb-3">
            <div class="custom-file">
                <input class="form-control-file" type="file" accept=".csv" name="uploaded-csv" id="uploaded-csv">
                <label class="custom-file-label" for="uploaded-csv">Choose file</label>
            </div>
            <div class="input-group-append">
                <input type="submit" class="btn btn-info" value="Import" />
            </div>
            </div>

        </form>
        
    </div>
</div>

<?php 
if ( isset( $_FILES['uploaded-csv'] ) &&  !empty($_FILES['uploaded-csv']) ) {
    echo '<div class="row"><div class="col-12">';
    $table = import_csv( $_FILES['uploaded-csv'] );
    echo generate_csv_html($table);
    echo '</div></div>';
}

?>

<!-- Content End -->
<?php include_once 'footer.php'; ?>
     

