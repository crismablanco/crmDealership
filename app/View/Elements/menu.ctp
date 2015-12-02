<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
<?php
echo $this->Html->link('CRM ', array('controller'=>'customers','action'=>'index'),array('class'=>'navbar-brand'));
?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Customers <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                <?php
                echo $this->Html->link('Customers', array('controller'=>'customers','action'=>'index'));
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('Add', array('controller'=>'customers','action'=>'add'));
                ?>
            </li>
           </ul>
        </li>


        <?php if ($current_user['role'] == 'admin' || $current_user['role'] == 'finance' || $current_user['role'] == 'saleman') { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Financing <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                <?php
                echo $this->Html->link('Financing', array('controller'=>'financingsources','action'=>'index'));
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('Add', array('controller'=>'financingsources','action'=>'add'));
                ?>
            </li>
           </ul>
        </li>
        <?php } ?>


        <?php if ($current_user['role'] == 'admin' || $current_user['role'] == 'saleman') { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Lead <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                <?php
                echo $this->Html->link('Lead', array('controller'=>'leadsources','action'=>'index'));
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('Add', array('controller'=>'leadsources','action'=>'add'));
                ?>
            </li>
           </ul>
        </li>
        <?php } ?>

        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sales <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                <?php
                echo $this->Html->link('Sales', array('controller'=>'sales','action'=>'index'));
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('Add', array('controller'=>'sales','action'=>'add'));
                ?>
            </li>
           </ul>
        </li>

        <!-- START DEALERSHIPS -->
        <?php if ($current_user['role'] == 'admin') { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-car"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                <?php
                echo $this->Html->link('Dealerships', array('controller'=>'dealerships','action'=>'index'));
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('Add', array('controller'=>'dealerships','action'=>'add'));
                ?>
            </li>
           </ul>
        </li>

        <?php } ?>
        <!-- END DEALERSHIPS -->

        <!-- START USERS -->
        <?php if ($current_user['role'] == 'admin') { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-users"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                <?php
                echo $this->Html->link('Users', array('controller'=>'users','action'=>'index'));
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('Add', array('controller'=>'users','action'=>'add'));
                ?>
            </li>
           </ul>
        </li>
        <?php } ?>
        <!-- END USERS -->


        <!-- START SETTINGS -->
        <?php if ($current_user['role'] == 'admin') { ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cogs"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                <?php
                echo $this->Html->link('Cities', array('controller'=>'citis','action'=>'index'));
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('States', array('controller'=>'states','action'=>'index'));
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('Countries', array('controller'=>'countris','action'=>'index'));
                ?>
            </li>
            <li>
                <?php
                echo $this->Html->link('Email Templates', array('controller'=>'emailtemplates','action'=>'index'));
                ?>
            </li>
            <li role="separator" class="divider"></li>
            <li>
                <?php
                echo $this->Html->link('Status Customer', array('controller'=>'statuscustomers','action'=>'index'));
                ?>
            </li>
          </ul>
        </li>
        <?php } ?>
        <!-- END SETTINGS -->

        <li>
            <?php echo $this->Form->create('Customer', array('type'=>'GET','class'=>'navbar-form navbar-right', 'url'=>array('controller'=>'customers', 'action'=>'search'))); ?>
              <div class="form-group">
                  <?php echo $this->Form->input('search', array('label'=>false,'div'=>false, 'id'=>'s', 'class'=>'form-control s', 'autocomplete'=>'off', 'placeholder'=>'Customer...')); ?>

                <?php
                    echo $this->Form->button('Search', array('div'=>false, 'class'=>'btn btn-primary'));
                    echo $this->Form->end();
                ?>
             </div>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-power-off"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
                <?php
                echo $this->Html->link('Logout', array('controller'=>'users','action'=>'logout'));
                ?>
            </li>
           </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
