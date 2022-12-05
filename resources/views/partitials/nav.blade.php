<div class="row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li style="margin-right: 12px"><a href="#">
                    /&nbsp;<i class="{{ $menu_icon }}"></i>
                    {{ $menu }}</a>
            </li>
            <li style="margin-right: 12px">
                <a href="#">
                    /&nbsp;<i class="{{ $submenu_icon }}"></i>
                    {{ $submenu }}
                </a>
            </li>
            @if($operation != '')
                <li style="margin-right: 12px">
                    <a href="#">
                        /&nbsp;<i class="{{ $operation_icon }}"></i>
                        {{ $operation }}
                    </a>
                </li>
            @endif
        </ol>
    </nav>
</div>
