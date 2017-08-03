<?php 
    $language = $this->session->userdata('site_lang');
    if (!isset($language)){
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);
    }

?>
<nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand" href="/"><?php echo lang($system_name); ?></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url(); ?>frontend/images/<?php echo $this->session->userdata('site_lang').'.png'; ?>"> <?php echo ucfirst($this->session->userdata('site_lang')); ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a onclick="window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/english'"  href="#"><img src="<?php echo base_url(); ?>frontend/images/english.png"> English </a> </li>
                        <li><a onclick="window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/vietnamese'" href="#"><img src="<?php echo base_url(); ?>frontend/images/vietnamese.png"> Vietnamese </a></li>
                    </ul>
                </li> 
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>