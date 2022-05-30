<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>  <?php echo $_SESSION['USER']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form ->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Main Navigation</li>
        <li class=" treeview">
          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>

          </a>
        </li>
        <li class="treeview">
          <a href="changepassword.php">
            <i class="fa fa-lock"></i> <span>Change Password</span>
          </a>
        </li>
        <li class="header">Masters</li>
    <!--    <li class=" treeview">
           <a href="document-groups.php">
           <i class="fa fa-files-o"></i> <span>Documents Groups</span>
           </a>
         </li>-->
          <li class=" treeview">
            <a href="categories.php">
            <i class="fa fa-cube"></i> <span>Categories Management</span>
            </a>
          </li>
         <!-- <li class="treeview">
           <a href="#">
             <i class="fa fa-cube"></i>
             <span>Categories Management</span>
             <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
             </span>
           </a>
           <ul class="treeview-menu">
             <li><a href="categories.php"><i class="fa fa-cube"></i> Categories</a></li>
          </ul>
         </li> -->
   <li class=" treeview">
          <a href="services.php">
          <i class="fa fa-send"></i> <span>Services Management</span>

          </a>
        </li>
               <li class="header">Website Configuration</li>
			   <li class=" treeview">
                <a href="portfolios.php">
                  <i class="fa fa-fw fa-file-image-o"></i> <span>Portfolios</span>
                </a>
              </li>
			   
			  <li class=" treeview">
                <a href="site-pages.php">
                  <i class="fa fa-fw fa-gear"></i> <span>Site Pages</span>
                </a>
              </li>
               <li class=" treeview">
                <a href="testimonials.php">
                  <i class="fa fa-thumbs-up"></i> <span>Testimonials</span>
                </a>
              </li>
              <li class=" treeview">
               <a href="settings.php?id=1">
                 <i class="fa fa-gears"></i> <span>Website Settings</span>
               </a>
             </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-cube"></i>
                  <span>Blogs Management</span>
                  <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="blog-categories.php"><i class="fa fa-cube"></i>Blog Categories</a></li>
                  <li><a href="blogs.php"><i class="fa fa-cube"></i>Blogs</a></li>
               </ul>
              </li>
			    <li class=" treeview">
                         <a href="gallery.php">
                         <i class="fa fa-users"></i> <span>Gallery</span>

                         </a>
                       </li>
					     <li class=" treeview">
                         <a href="brands.php">
                         <i class="fa fa-trademark"></i> <span>Brands</span>

                         </a>
                       </li>
          <!--   <li class=" treeview">
                    <a href="authorities.php">
                    <i class="fa fa-trademark"></i> <span>Authority Management</span>

                    </a>
                  </li>
                  <li class=" treeview">
                     <a href="payment-terms.php">
                     <i class="fa  fa-file-text"></i> <span>Payment Terms</span>
                     </a>
                   </li>
                   <li class=" treeview">
                      <a href="process-layouts.php">
                      <i class="fa fa-sitemap"></i> <span>Process Layouts</span>
                      </a>
                    </li> -->
                <li class="header">Customer Relationship Management</li>
                  <li class=" treeview">
                         <a href="leads.php">
                         <i class="fa fa-clipboard"></i> <span>Leads Management</span>
                         </a>
                       </li>
                             
                    <!--   <li class="header">Project Management</li>
                       <li class=" treeview">
                              <a href="projects.php">
                              <i class="fa fa-tags"></i> <span>Projects</span>
                              </a>
                            </li>
                               <li class="header">Accounts Management</li>
                            <li class=" treeview">
                                   <a href="expenses.php">
                                   <i class="fa fa-money"></i> <span>Expense Management</span>
                                   </a>
                                 </li>
             <li class="header">Trash Management</li>

             <li class="treeview">
               <a href="#">
                 <i class="fa fa-recycle"></i>
                 <span>Recycle Bin</span>
                 <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                 </span>
               </a>
               <ul class="treeview-menu">

                 <li><a href="client-trash.php"><i class="fa fa-circle-o"></i> Clients</a></li>
                  <li><a href="project-trash.php"><i class="fa fa-circle-o"></i> Projects</a></li>
               </ul>
             </li> -->

       <!--   <li class=" treeview">
             <a href="categories.php">
               <i class="fa fa-cube"></i> <span>Category Management</span>

             </a>
           </li>
           <li class=" treeview">
                <a href="product.php">
                  <i class="fa fa-cubes"></i> <span>Product Management</span>

                </a>
              </li>
              <li class=" treeview">
                   <a href="site-config.php">
                     <i class="fa fa-gear"></i> <span>Site Config Management</span>

                   </a>
                 </li>
                 <li class=" treeview">
                      <a href="site-pages.php">
                        <i class="fa fa-sticky-note"></i> <span>Site Pages Management</span>

                      </a>
                    </li>
                    <li class=" treeview">
                         <a href="recycle-bin.php">
                           <i class="fa fa-recycle"></i> <span>Recycle Bin</span>

                         </a>
                       </li>
           <li class="active treeview">
          <a href="productmanagement.php">
            <i class="fa fa-birthday-cake"></i> <span>Product management</span>

          </a>
        </li>
        <li class="active treeview">
          <a href="testonomial.php">
            <i class="fa fa-lock"></i> <span>Change Password</span>

          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>-->
    </section>
    <!-- /.sidebar -->
  </aside>
