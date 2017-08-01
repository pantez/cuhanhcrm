<nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
            </button>
            <a class="navbar-brand" href="/"><?php echo lang('Onion CRM'); ?></a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="frontend/images/en.png"> English <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a onclick="window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/english'"  href="#"><img src="frontend/images/en.png"> English </a> </li>
                        <li><a onclick="window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/vietnamese'" href="#"><img src="frontend/images/vi.png"> VietNam </a></li>
                    </ul>
                </li> 
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>