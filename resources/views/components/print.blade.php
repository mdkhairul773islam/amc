@push('header-style')
<style>
    .print_header {
        border-bottom: 1px solid #ccc;
        display: flex;
        margin-bottom: 15px;
        padding: 20px 0 10px;
    }
    .print_header .header_logo {
        margin-right: 20px;
    }
    .print_header .wordLogo_box h2 {
        font-weight: bold;
        font-size: 42px;
        margin: 0;
        text-transform: uppercase;
    }
    .print_header .wordLogo_box {
        border-bottom: 8px solid red;
        border-right: 8px solid #000;
        border-left: 8px solid #000;
        border-top: 8px solid red;
        height: calc(100% - 12px);
        width: auto;
        display: flex;
        margin-top: 5px;
        padding: 10px 5px;
        text-align: center;
        align-items: center;
    }
    .print_header_info {width: 100%;}
    .print_header_info h3 {
        font-weight: bold;
        font-size: 42px;
        margin-top: 0;
    }
    .print_header_info p strong {
        display: inline-block;
        min-width: 70px;
        font-weight: 600;
    }
    .print_header_info p {
        font-size: 16px;
        margin: 3px 0;
        color: #000;
    }
    .print_header img {
        max-width: 220px;
        width: auto;
    }
</style>
@endpush
@php($siteInfo = settings())
<div class="print_header print_flex_only">
    <div class="header_logo">
        @if(!empty($siteInfo->logo))
        <img style="height: 120px;" src="{{asset($siteInfo->logo)}}" alt="Logo">
        @else
        <div class="wordLogo_box">
            <h2 id="wordLogo"></h2>
        </div>
        @endif
    </div>
    <div class="print_header_info">
        <h3 id="companyName">{{ (!empty($siteInfo->site_name) ? $siteInfo->site_name : '') }}</h3>
        <p><strong>Mobile</strong> : {{ (!empty($siteInfo->mobile) ? $siteInfo->mobile : '') }}</p>
        <p><strong>Address</strong> : {{ (!empty($siteInfo->address) ? $siteInfo->address : '') }}</p>
    </div>
</div>

@push('footer-script')
<script>
    var myStr = document.getElementById("companyName").innerHTML;
    var strArray = myStr.split(" ");
    var text = strArray[0].charAt(0) + strArray[1].charAt(0);
    document.getElementById("wordLogo").innerHTML = text;
</script>
@endpush
