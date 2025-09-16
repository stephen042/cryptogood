@php
    $adminMessage = auth()->user()->admin_messages->first();
@endphp

@if ($adminMessage && $adminMessage->message && $adminMessage->title)
    <div id="adminMessageModal"
         style="position: fixed; inset: 0; background-color: rgba(0,0,0,0.7); display: flex; align-items: flex-start; justify-content: center; z-index: 9999; backdrop-filter: blur(4px); padding-top: 80px;">
        <div style="background-color: #06090f; color: white; width: 90%; max-width: 500px; border-radius: 10px; overflow: hidden; box-shadow: 0 10px 25px rgba(0,0,0,0.5);">
            
            <!-- Modal Header -->
            <div style="background-color: #111827; padding: 16px; display: flex; justify-content: space-between; align-items: center;">
                <h2 style="font-size: 18px; font-weight: bold;">{{ $adminMessage->title }}</h2>
                <button onclick="document.getElementById('adminMessageModal').style.display='none'"
                        style="background: transparent; border: none; color: #fff; font-size: 20px; cursor: pointer;">
                    &times;
                </button>
            </div>

            <!-- Modal Body -->
            <div style="padding: 20px; font-size: 15px; line-height: 1.5; background-color: #1f2937;
                        max-height: 300px; overflow-y: auto;">
                {{ $adminMessage->message }}
            </div>
        </div>
    </div>
@endif
