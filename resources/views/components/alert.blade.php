<div 
    x-data="{ show: false, message: '', type: 'success' }"
    x-show="show"
    x-init="
        window.addEventListener('notify', e => {
            message = e.detail.message;
            type = e.detail.type;
            show = true;
            setTimeout(() => show = false, 10000);
        })
    "
    x-cloak
    style="position:fixed; top:16px; right:16px; z-index:9999;"
>
    <div 
        :style="`
            display:flex; 
            align-items:center; 
            justify-content:space-between;
            gap:12px;
            padding:10px 13px; 
            border-radius:12px; 
            box-shadow:0 4px 10px rgba(0,0,0,0.15); 
            border:1px solid; 
            transition:all 0.3s ease; 
            max-width:340px;
            word-break: break-word;

            ${type === 'success' 
                ? 'background-color:#d1fae5; color:#065f46; border-color:#34d399;' 
                : 'background-color:#fee2e2; color:#991b1b; border-color:#f87171;'}
        `"
    >
        <span 
            x-text="message" 
            style="flex:1; font-size:15px; line-height:1.4;"
        ></span>
        <button 
            type="button" 
            @click="show = false"
            aria-label="Close"
            style="
                font-size:20px; 
                font-weight:bold; 
                background:none; 
                border:none; 
                cursor:pointer; 
                color:inherit;
            "
        >&times;</button>
    </div>
</div>
