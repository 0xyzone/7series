<footer
    class="bg-zinc-100 dark:bg-zinc-950 pt-32 pb-12 border-t border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-16 mb-24">
            <div class="col-span-2 space-y-8" x-data="{ 
                email: '', 
                message: '',
                status: '', 
                loading: false,
                async subscribe() {
                    this.loading = true;
                    this.status = '';
                    this.message = '';
                    try {
                        const response = await fetch('{{ route('newsletter.subscribe') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({ email: this.email })
                        });
                        const data = await response.json();
                        if (response.ok) {
                            this.status = 'success';
                            this.message = data.message;
                            this.email = '';
                        } else {
                            this.status = 'error';
                            this.message = data.message || (data.errors && data.errors.email ? data.errors.email[0] : 'Validation failed.');
                        }
                    } catch (e) {
                        this.status = 'error';
                        this.message = 'Something went wrong. Please try again.';
                    } finally {
                        this.loading = false;
                    }
                }
            }">
                <div class="text-5xl font-black text-zinc-900 dark:text-white tracking-tighter">7SERIES</div>
                <p class="text-xl text-zinc-500 max-w-sm">Join our inner circle for exclusive drops and limited release
                    access.</p>
                <form class="flex max-w-md" @submit.prevent="subscribe()">
                    <input type="email" placeholder="ENTER EMAIL" required x-model="email"
                        class="flex-1 bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-800 px-6 py-4 focus:border-red-600 focus:outline-none dark:text-white transition-colors">
                    <button
                        class="bg-red-600 text-white px-8 py-4 font-black hover:bg-red-700 transition-colors uppercase disabled:opacity-50"
                        :disabled="loading">
                        <span x-show="!loading">JOIN</span>
                        <span x-show="loading" x-cloak>...</span>
                    </button>
                </form>
                <template x-if="message">
                    <p class="text-sm font-bold uppercase tracking-widest mt-4"
                        :class="status === 'success' ? 'text-green-600' : 'text-red-600'" x-text="message"></p>
                </template>
            </div>
            <div class="space-y-6">
                <h4 class="text-xs font-black text-red-600 uppercase tracking-widest">Navigation</h4>
                <ul class="space-y-4 font-bold text-zinc-600 dark:text-zinc-400">
                    <li><a href="/shop"
                            class="hover:text-zinc-900 dark:hover:text-white transition-colors uppercase">Shop All</a>
                    </li>
                    <li><a href="/#collections"
                            class="hover:text-zinc-900 dark:hover:text-white transition-colors uppercase">Archive</a>
                    </li>
                    <li><a href="#"
                            class="hover:text-zinc-900 dark:hover:text-white transition-colors uppercase">Locations</a>
                    </li>
                    <li><a href="#"
                            class="hover:text-zinc-900 dark:hover:text-white transition-colors uppercase">Studio</a>
                    </li>
                </ul>
            </div>
            <div class="space-y-6">
                <h4 class="text-xs font-black text-red-600 uppercase tracking-widest">Legal</h4>
                <ul class="space-y-4 font-bold text-zinc-600 dark:text-zinc-400">
                    <li><a href="#"
                            class="hover:text-zinc-900 dark:hover:text-white transition-colors uppercase">Privacy
                            Policy</a></li>
                    <li><a href="#" class="hover:text-zinc-900 dark:hover:text-white transition-colors uppercase">Terms
                            of Use</a></li>
                    <li><a href="#"
                            class="hover:text-zinc-900 dark:hover:text-white transition-colors uppercase">Shipping</a>
                    </li>
                    <li><a href="#"
                            class="hover:text-zinc-900 dark:hover:text-white transition-colors uppercase">Refunds</a>
                    </li>
                </ul>
            </div>
        </div>

        <div
            class="pt-12 border-t border-zinc-200 dark:border-zinc-900 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-xs font-bold text-zinc-500 uppercase tracking-widest">&copy; {{ now()->year }} SEVEN SERIES
                APPAREL. ALL RIGHTS RESERVED.</p>
            <div class="flex gap-8">
                <a href="#"
                    class="text-xs font-black text-zinc-900 dark:text-white uppercase tracking-widest hover:text-red-600 transition-colors">Instagram</a>
                <a href="#"
                    class="text-xs font-black text-zinc-900 dark:text-white uppercase tracking-widest hover:text-red-600 transition-colors">Twitter</a>
                <a href="#"
                    class="text-xs font-black text-zinc-900 dark:text-white uppercase tracking-widest hover:text-red-600 transition-colors">Behance</a>
            </div>
        </div>
    </div>
</footer>