<x-guest-layout>
    <div class="register-container">
        <div class="form-container">
            <h2>إنشاء حساب</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <x-input-label for="name" value="الاسم" />
                    <x-text-input type="text" id="name" name="name" :value="old('name')" required />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div class="form-group">
                    <x-input-label for="email" value="البريد الإلكتروني" />
                    <x-text-input type="email" id="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="form-group">
                    <x-input-label for="phone" value="رقم الهاتف" />
                    <x-text-input type="tel" id="phone" name="phone" :value="old('phone')" required />
                    <x-input-error :messages="$errors->get('phone')" />
                </div>

                <div class="form-group">
                    <x-input-label for="password" value="كلمة المرور" />
                    <x-text-input type="password" id="password" name="password" :value="old('password')" required />
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <div class="form-group">
                    <x-input-label for="password_confirmation" value="تأكيد كلمة المرور" />
                    <x-text-input type="password" id="password_confirmation" name="password_confirmation" :value="old('Confirm Password')" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <x-primary-button class="btn">تسجيل الحساب</x-primary-button>

                <div class="login-link">
                    <p>هل لديك حساب بالفعل؟ <a href="{{ route('login') }}"> تسجيل الدخول </a></p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout> 