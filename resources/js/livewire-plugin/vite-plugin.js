export default function livewire() {
    return {
        name: "livewire-plugin",
        config() {
            return {
                server: {
                    watch: {
                        ignored: [
                            "**/vendor/**",
                            "!**/vendor/livewire/livewire/dist/livewire.js",
                        ],
                    },
                },
            };
        },
    };
}
