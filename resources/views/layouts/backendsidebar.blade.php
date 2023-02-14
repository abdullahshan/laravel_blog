<nav class="side-nav">
    <a href="{{ route('backend.home') }}" style="color: white; font-size: 30px;" class="intro-x d-flex align-items-center ps-5 pt-4">
       <h1>Blog</h1>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('backend.home') }}" class="side-menu {{ request()->routeIs('backend.home') ? 'side-menu--active side-menu--open' : '' }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard 
                   
                </div>
            </a>
           
               
        
        </li>
       
    </ul>
    <ul>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->routeIs('role.*') ? 'side-menu--active side-menu--open' : '' }}">
                <div class="side-menu__icon"> <i data-feather="folder"></i> </div>
                <div class="side-menu__title">
                    Role Manegment
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="{{ route('role.add') }}" class="side-menu side-menu--active side-menu--open">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Role_Manegment </div>
                    </a>
                </li>
            </ul>
        </li>

        
       
    </ul>

    <ul>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->routeIs('category.*') ? 'side-menu--active side-menu--open' : '' }}">
                <div class="side-menu__icon"> <i data-feather="folder"></i> </div>
                <div class="side-menu__title">
                    Category
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="{{ route('category.add') }}" class="side-menu side-menu--active side-menu--open">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Category_Manegment </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category.sub.add') }}" class="side-menu side-menu--active side-menu--open">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Sub_Category_Manegment </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>



    <ul>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->routeIs('post.*') ? 'side-menu--active side-menu--open' : '' }}">
                <div class="side-menu__icon"> <i data-feather="folder"></i> </div>
                <div class="side-menu__title">
                    Post
                    <div class="side-menu__sub-icon"> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="{{ route('post.add') }}" class="side-menu side-menu--active side-menu--open">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Post_Manegment </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('post.allpost') }}" class="side-menu side-menu--active side-menu--open">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> View_all_POst </div>
                    </a>
                </li>
            </ul>
        </li>

        
       
    </ul>
    
</nav>