
<noscript>
    <div class="alert alert-danger">{LANG.nojs}</div>
</noscript>
<header>
    <div class="section-header">
        <div class="wraper">
            <div id="header">
                <div class="col-md-8 wrap-header-1 hidden-sm hidden-xs"></div>
                <div class="col-md-8 wrap-header-2 col-sm-6 col-xs-7">
                    <div class="logo ">
                        <a title="{SITE_NAME}" href="{THEME_SITE_HREF}" itemprop="url">HADES</a>
                        <!-- BEGIN: site_name_h1 -->
                        <h1>{SITE_NAME}</h1>
                        <h2>{SITE_DESCRIPTION}</h2>
                        <!-- END: site_name_h1 -->
                        <!-- BEGIN: site_name_span -->
                        <span class="site_name">{SITE_NAME}</span> <span class="site_description">{SITE_DESCRIPTION}</span>
                        <!-- END: site_name_span -->
                    </div>
                </div>
                <div class="headerSearch col-xs-7 col-sm-6 col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" maxlength="{NV_MAX_SEARCH_LENGTH}" placeholder="{LANG.search}..."><span class="input-group-btn"><button type="button" class="btn btn-info" data-url="{THEME_SEARCH_URL}" data-minlength="{NV_MIN_SEARCH_LENGTH}" data-click="y">
                                <em class="fa fa-search fa-lg"></em>
                            </button></span>
                    </div>
                </div>
                <div class="right-ads">[HEAD_RIGHT]</div>
            </div>
        </div>
    </div>
</header>
<div class="section-nav">
    <div class="wraper">
        <nav class="second-nav" id="menusite">
            <div class="container">
                <div class="row">
                    <div class="bg box-shadow">[MENU_SITE]</div>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="section-body">
    <div class="">
        <section>
            <div class="container" id="body">
                                <div class="banner">
                                    <img src="url{BANNER_SRC}" alt="">
                                </div>
                [THEME_ERROR_INFO]