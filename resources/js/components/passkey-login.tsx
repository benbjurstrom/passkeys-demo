import { router } from '@inertiajs/react';
import { usePasskeyLogin } from '@laravel/passkeys/react';
import { KeyRound } from 'lucide-react';
import InputError from '@/components/input-error';
import { Button } from '@/components/ui/button';
import { Separator } from '@/components/ui/separator';
import { Spinner } from '@/components/ui/spinner';

export default function PasskeyLogin() {
    const {
        login: passkeyLogin,
        isLoading: passkeyLoading,
        error: passkeyError,
        isSupported: passkeySupported,
    } = usePasskeyLogin({
        onSuccess: (response) => router.visit(response.redirect),
        onError: (error) => console.log('Passkey error:', error),
    });

    if (!passkeySupported) {
        return null;
    }

    return (
        <>
            <div className="grid gap-2">
                <Button
                    type="button"
                    variant="outline"
                    className="w-full"
                    onClick={() => passkeyLogin()}
                    disabled={passkeyLoading}
                >
                    {passkeyLoading ? (
                        <Spinner />
                    ) : (
                        <KeyRound className="h-4 w-4" />
                    )}
                    {passkeyLoading
                        ? 'Authenticating...'
                        : 'Sign in with passkey'}
                </Button>
                {passkeyError && (
                    <InputError message={passkeyError} className="text-center" />
                )}
            </div>

            <div className="relative my-6">
                <div className="absolute inset-0 flex items-center">
                    <Separator className="w-full" />
                </div>
                <div className="relative flex justify-center text-xs uppercase">
                    <span className="bg-background text-muted-foreground px-2">
                        Or continue with email
                    </span>
                </div>
            </div>
        </>
    );
}
