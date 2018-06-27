<section id="content">

	<div class="container center">
	<div class="row">
					<span class="red-text"><b><?php echo $error;?></b></span>

		<div class="col s4 offset-s4"><br>


			<div class="flow-text">File Upload</div><br>
<?php echo form_open_multipart('advts/do_upload/'.$advt_id);?>
<input type="file" id="input-file-max-fs"  name="userfile" class="dropify" data-max-file-size="2M" />
<br /><br />

<input type="submit" value="upload" class="btn color" />

</form>
</div>
</div></div></section>

<script type="text/javascript">
        $(document).ready(function(){
            // Basic
            $('.dropify').dropify();

            // Used events
            var drEvent = $('.dropify-event').dropify();

            drEvent.on('dropify.beforeClear', function(event, element){
                return confirm("Do you really want to delete \"" + element.filename + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element){
                alert('File deleted');
            });
        });
    </script>
