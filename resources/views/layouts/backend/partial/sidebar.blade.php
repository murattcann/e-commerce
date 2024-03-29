<div class="list-group">


    <a href="{{route('admin.user.index')}}" class="list-group-item">
        <span class="fa fa-fw fa-users "></span>&nbsp;Kullanıcı Yönetimi
    </a>
    <a href="{{route('admin.category.index')}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Kategori Yönetimi
    </a>
    <a href="{{route('admin.product.index')}}" class="list-group-item">
        <span class="fa fa-fw fa-barcode"></span> Ürün Yönetimi
    </a>
    <a href="{{route('admin.order.index')}}" class="list-group-item">
        <span class="fa fa-fw fa-shopping-cart"></span> Sipariş Yönetimi
    </a>
    <a href="#" class="list-group-item collapsed" data-target="#submenu1" data-toggle="collapse" data-parent="#sidebar"><span class="fa fa-fw fa-dashboard"></span> Categories<span class="caret arrow"></span></a>
    <div class="list-group collapse" id="submenu1">
        <a href="#" class="list-group-item">Category</a>
        <a href="#" class="list-group-item">Category</a>
    </div>
    <a href="#" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Users
        <span class="badge badge-dark badge-pill pull-right">14</span>
    </a>
    <a href="#" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Orders
        <span class="badge badge-dark badge-pill pull-right">14</span>
    </a>
</div>
