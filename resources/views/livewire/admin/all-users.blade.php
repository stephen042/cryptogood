<div style="background-color:#111827; box-shadow:0 4px 10px rgba(0,0,0,0.5); border-radius:12px; overflow:hidden;">
    <!-- Header -->
    <div
        style="padding:20px; border-bottom:1px solid #374151; display:flex; align-items:center; justify-content:space-between;">
        <h2 style="font-size:18px; font-weight:600; color:#e5e7eb; margin:0;">All Users</h2>
    </div>

    <!-- Table -->
    <div style="overflow-x:auto;">
        <table style="width:100%; border-collapse:collapse; font-size:14px; color:#e5e7eb; background-color:#1f2937;">
            <thead style="background-color:#374151; color:#f9fafb;">
                <tr style="font-size:14px; font-weight:600; text-align:left;">
                    <th style="padding:12px 24px;">S/N</th>
                    <th style="padding:12px 24px;">Status</th>
                    <th style="padding:12px 24px;">Name</th>
                    <th style="padding:12px 24px;">Reg Date</th>
                    <th style="padding:12px 24px;">Country</th>
                    <th style="padding:12px 24px;">Balance</th>
                    <th style="padding:12px 24px;">Sub Balance</th>
                    <th style="padding:12px 24px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                <tr style="border-bottom:1px solid #374151;">
                    <td style="padding:12px 24px; color:#f9fafb;">{{ $index + 1 }}</td>
                    <td style="padding:12px 24px;">
                        @if ($user->account_hold == 1)
                        <span style="color:#ef4444;">Inactivated</span>
                        @else
                        <span style="color:#22c55e;">Activated</span>
                        @endif
                    </td>
                    <td style="padding:12px 24px; display:flex; align-items:center; gap:10px;">
                        <img src="{{ asset('assets/src/images/logo/logo.svg') }}" alt="Profile Picture"
                            style="width:40px; height:40px; border-radius:50%; object-fit:contain;">
                        <div style="display:flex; flex-direction:column;">
                            <span style="font-weight:500; color:#f9fafb;">{{ $user->name }}</span>
                            <span style="color:#9ca3af;">{{ $user->email }}</span>
                        </div>
                    </td>
                    <td style="padding:12px 24px; color:#f9fafb;">{{ $user->created_at->format('d M, Y') }}</td>
                    <td style="padding:12px 24px; color:#f9fafb;">{{ $user->country }}</td>
                    <td style="padding:12px 24px; color:#f9fafb;">${{ number_format($user->balance,2) }}</td>
                    <td style="padding:12px 24px; color:#f9fafb;">${{ number_format($user->sub_balance,2) }}</td>
                    <td style="padding:12px 24px;">
                        <div style="display:flex; gap:8px;">
                            <!-- Edit Button -->
                            <a href="{{ route('admin.edit-user', $user->id) }}"
                                style="display:flex; align-items:center; gap:6px; padding:6px 12px; background:none; border:none; color:#3b82f6; font-weight:600; border-radius:6px; cursor:pointer; text-decoration:none;">
                                ✏️ <span>Edit</span>
                            </a>

                            <!-- Delete Button -->
                            <button type="button" wire:click="deleteUser({{ $user->id }})"
                                wire:confirm="Are you sure you want to delete this user?"
                                style="display:flex; align-items:center; gap:6px; padding:6px 12px; background:none; border:none; color:#ef4444; font-weight:600; border-radius:6px; cursor:pointer;">
                                🗑 <span>Delete</span>
                            </button>

                            <!-- Activate/Deactivate -->
                            @if ($user->account_hold == 2)
                            <button type="button" wire:click.prevent="deactivateUser({{ $user->id }})"
                                wire:confirm="Are you sure you want to Deactivate this user?"
                                style="display:flex; align-items:center; gap:6px; padding:6px 12px; background:none; border:none; color:#facc15; font-weight:600; border-radius:6px; cursor:pointer;">
                                ⚠️ <span>Deactivate</span>
                            </button>
                            @else
                            <button type="button" wire:click.prevent="activateUser({{ $user->id }})"
                                wire:confirm="Are you sure you want to Activate this user?"
                                style="display:flex; align-items:center; gap:6px; padding:6px 12px; background:none; border:none; color:#22c55e; font-weight:600; border-radius:6px; cursor:pointer;">
                                ✅ <span>Activate</span>
                            </button>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <div style="padding:20px; background-color:#111827; border-top:1px solid #374151;">
        {{ $users->links('pagination::tailwind') }}
    </div>
</div>