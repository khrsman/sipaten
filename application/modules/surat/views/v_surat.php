    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>Surat</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Surat</li>
            </ol>
        </section> -->
        <section class="content" id="page_content">
</section>

<script type="text/javascript">
$(document).ready(function(){
    page = "<?php echo $this->input->get('p'); ?>";
  $.get("<?php echo base_url('surat/') ?>"+page).done(function(data){
         $("#page_content").html(data);
  })
})
</script>
