
@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 600px; margin: 2rem auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); padding: 2rem;">
    <h1 style="margin-bottom: 1.5rem;">Edit User</h1>

    @if ($errors->any())
        <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: 6px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.2rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="name" class="form-label" style="font-weight: 500;">Name</label>
            <input type="text" name="name" id="name" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="email" class="form-label" style="font-weight: 500;">Email</label>
            <input type="email" name="email" id="email" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="password" class="form-label" style="font-weight: 500;">Password <span style="font-weight: normal; color: #888;">(leave blank to keep current)</span></label>
            <input type="password" name="password" id="password" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;">
        </div>

        <div class="mb-3" style="margin-bottom: 1rem;">
            <label for="password_confirmation" class="form-label" style="font-weight: 500;">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;">
        </div>

        <div class="mb-3" style="margin-bottom: 1.5rem;">
            <label for="is_admin" class="form-label" style="font-weight: 500;">Role</label>
            <select name="is_admin" id="is_admin" class="form-control" style="width: 100%; padding: 0.5rem; border-radius: 4px; border: 1px solid #e5e7eb;">
                <option value="0" {{ old('is_admin', $user->is_admin) == '0' ? 'selected' : '' }}>User</option>
                <option value="1" {{ old('is_admin', $user->is_admin) == '1' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div style="display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary" style="background: #2563eb; color: #fff; border: none; padding: 0.5rem 1.5rem; border-radius: 4px;">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary" style="background: #6b7280; color: #fff; padding: 0.5rem 1.5rem; border-radius: 4px; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>
@endsection