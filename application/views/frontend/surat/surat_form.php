<div class="blog-post-area">
    <h2 class="title text-center"><?php echo $header ?></h2>
    <div class="single-blog-post">
        <div class="post-meta">
            <div class="row">
                <div class="col-md-6">
                    <?php echo form_open(current_url()) ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo validation_errors(); ?>
                            <label>Nama Pengirim *</label>
                            <input type="text" name="user_name" class="form-control" placeholder="Nama Pengirim">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Email Pengirim *</label>
                            <input type="text" name="user_email" class="form-control" placeholder="Nama Email">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Judul Pertanyaan *</label>
                            <input type="text" name="title" class="form-control" placeholder="Judul Pertanyaan">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Pertanyaan *</label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary" value="Kirim">
                        </div>
                    </div>
                    <?php echo form_close() ?>
                </div>
                <div class="col-md-6">
                    <div class="box-question">
                        Masukkan nama dan email anda pada kolom yang telah disediakan disamping untuk mengajukan pertanyaan,
                        Pernayaan anda akan dijawab lewat postingan dan akan dikirim ke email.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/blog-post-area-->
<script src="<?php echo base_url('media/tinymce/tinymce.min.js'); ?>"></script>
<script>
    tinymce.init({
        menu: {// this is the complete default configuration
            file: {title: 'File', items: 'newdocument'},
            edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
            insert: {title: 'Insert', items: 'link media | template hr'},
            view: {title: 'View', items: 'visualaid'},
            format: {title: 'Format', items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'},
            table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'},
            tools: {title: 'Tools', items: 'spellchecker code'}
        }
    });
    tinymce.init({
        selector: 'textarea',
        plugins: "table",
        tools: "inserttable",
        plugins: "paste",
                paste_as_text: true
    });
</script>

