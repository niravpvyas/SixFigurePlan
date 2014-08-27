                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><?php echo $pageName; ?></h1>
                    <?php
                        if(isset($formName))
                        {
                            ?>
                            <ol class="breadcrumb">
                                <li><a href="<?php echo $formName; ?>"><i class="fa fa-plus-square"></i> Add New</a>&nbsp;</li>
                            </ol>
                            <?php
                        }
                    ?>
                </section>