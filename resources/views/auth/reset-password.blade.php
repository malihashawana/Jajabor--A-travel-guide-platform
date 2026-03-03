<form method="POST" action="{{ route('password.store') }}" style="max-width: 400px; margin: 0 auto; padding: 30px; background-color: white; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px;">
    <!-- Heading -->
    <h2 style="text-align: center; color: #4A4A4A; font-weight: 600; margin-bottom: 24px;">Reset your password</h2>

    <!-- CSRF Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email Address -->
    <div style="margin-bottom: 16px;">
        <label for="email" style="display: block; color: #4A4A4A; font-weight: 500; margin-bottom: 8px;">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" style="width: 100%; padding: 12px; border: 1px solid #E0E0E0; border-radius: 6px; font-size: 16px; box-sizing: border-box; transition: border-color 0.3s;" />
        <!-- Error Message -->
        <?php if ($errors->has('email')): ?>
            <div style="margin-top: 8px; color: #FF4D4D; font-size: 14px;">
                <?php echo $errors->first('email'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Password -->
    <div style="margin-bottom: 16px;">
        <label for="password" style="display: block; color: #4A4A4A; font-weight: 500; margin-bottom: 8px;">Password</label>
        <input id="password" name="password" type="password" required autocomplete="new-password" style="width: 100%; padding: 12px; border: 1px solid #E0E0E0; border-radius: 6px; font-size: 16px; box-sizing: border-box; transition: border-color 0.3s;" />
        <!-- Error Message -->
        <?php if ($errors->has('password')): ?>
            <div style="margin-top: 8px; color: #FF4D4D; font-size: 14px;">
                <?php echo $errors->first('password'); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Confirm Password -->
    <div style="margin-bottom: 16px;">
        <label for="password_confirmation" style="display: block; color: #4A4A4A; font-weight: 500; margin-bottom: 8px;">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" style="width: 100%; padding: 12px; border: 1px solid #E0E0E0; border-radius: 6px; font-size: 16px; box-sizing: border-box; transition: border-color 0.3s;" />
        <!-- Error Message -->
        <?php if ($errors->has('password_confirmation')): ?>
            <div style="margin-top: 8px; color: #FF4D4D; font-size: 14px;">
                <?php echo $errors->first('password_confirmation'); ?>
            </div>
        <?php endif; ?>
    </div>

    <div style="display: flex; justify-content: flex-end;">
        <button type="submit" style="width: 100%; padding: 14px; background-color: #4F46E5; color: white; font-weight: 600; border-radius: 6px; border: none; cursor: pointer; transition: background-color 0.3s;">
            Reset Password
        </button>
    </div>
</form>
