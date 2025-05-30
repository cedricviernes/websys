
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 900px; margin: 2rem auto;">
    <h1 style="margin-bottom: 2rem;">Users Report</h1>
    <div style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 2rem;">
        <h2>Total Users: {{ $totalUsers }}</h2>
        <table style="width:100%; margin-top: 1.5rem; border-collapse: separate; border-spacing: 0 12px;">
            <thead>
                <tr style="background: #f3f4f6;">
                    <th style="padding: 1rem 1.5rem;">Name</th>
                    <th style="padding: 1rem 1.5rem;">Email</th>
                    <th style="padding: 1rem 1.5rem;">Role</th>
                    <th style="padding: 1rem 1.5rem;">Registered</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr style="border-bottom: 1px solid #e5e7eb;">
                    <td style="padding: 1rem 1.5rem;">{{ $user->name }}</td>
                    <td style="padding: 1rem 1.5rem;">{{ $user->email }}</td>
                    <td style="padding: 1rem 1.5rem;">{{ $user->is_admin ? 'Admin' : 'User' }}</td>
                    <td style="padding: 1rem 1.5rem;">{{ $user->created_at->format('Y-m-d') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" style="padding: 1rem; text-align: center; color: #6b7280;">No users found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection