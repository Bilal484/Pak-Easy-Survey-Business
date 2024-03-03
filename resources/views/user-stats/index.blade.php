<div style="padding: 1rem;">
    <h2 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem;">User Stats</h2>
    <div style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f8f9fa;">
                    <th
                        style="padding: 0.75rem; text-align: left; font-size: 0.75rem; text-transform: uppercase; color: #6c757d;">
                        User ID</th>
                    <th
                        style="padding: 0.75rem; text-align: left; font-size: 0.75rem; text-transform: uppercase; color: #6c757d;">
                        Referring User</th>
                    <th
                        style="padding: 0.75rem; text-align: left; font-size: 0.75rem; text-transform: uppercase; color: #6c757d;">
                        Referral Earnings</th>
                    <th
                        style="padding: 0.75rem; text-align: left; font-size: 0.75rem; text-transform: uppercase; color: #6c757d;">
                        Review Earnings</th>
                    <th
                        style="padding: 0.75rem; text-align: left; font-size: 0.75rem; text-transform: uppercase; color: #6c757d;">
                        Total Earnings</th>
                    <th
                        style="padding: 0.75rem; text-align: left; font-size: 0.75rem; text-transform: uppercase; color: #6c757d;">
                        Level</th>
                    <th
                        style="padding: 0.75rem; text-align: left; font-size: 0.75rem; text-transform: uppercase; color: #6c757d;">
                        Total Referrals</th>
                    <th
                        style="padding: 0.75rem; text-align: left; font-size: 0.75rem; text-transform: uppercase; color: #6c757d;">
                        Registration Date   </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userStats as $userStat)
                    <tr>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #dee2e6;">{{ $userStat->user_id }}</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #dee2e6;">{{ $userStat->user->name }}</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #dee2e6;">{{ $userStat->earnings }}</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #dee2e6;">
                            {{ $userStat->reviews()->count() * 10 }}</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #dee2e6;">
                            {{ $userStat->earnings + $userStat->reviews()->count() * 10 }}</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #dee2e6;">{{ $userStat->level }}</td>
                        <td style="padding: 0.75rem; border-bottom: 1px solid #dee2e6;">{{ $userStat->total_referrals }}
                        <td>{{ $userStat->created_at->format('Y-m-d') }}</td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
