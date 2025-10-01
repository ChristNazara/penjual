<head>
    <link rel="stylesheet" href="<?php echo base_url('css/login3.css') ?>">
</head>
<h1>Portal Penjualan</h1>
<?php echo form_open(site_url('log/masuk') )?>
<div class="stand">
  <div class="outer-screen">
    <div class="inner-screen">
      <div class="form">
        <input type="text" name="un" class="zocial-dribbble" placeholder="Masukan Username" required="required" />
        <input type="password" name="ps" placeholder="Password" required="required" />
         <input type="submit" value="Login" />
        <a href="">Lost your password?</a>
      </div> 
      <?php echo form_close();?>
    </div> 
  </div> 
</div>
  