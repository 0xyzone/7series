<footer
    class="bg-zinc-100 dark:bg-zinc-950 pt-32 pb-12 border-t border-zinc-200 dark:border-zinc-900 transition-colors duration-500">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-16 mb-24">
            <div class="col-span-2 space-y-8">
                <div class="text-5xl font-black text-zinc-900 dark:text-white tracking-tighter">7SERIES</div>
                <p class="text-xl text-zinc-500 max-w-sm">Join our inner circle for exclusive drops and limited release
                    access.</p>
                <form class="flex max-w-md" action="#" method="POST" @submit.prevent>
                    <input type="email" placeholder="ENTER EMAIL"
                        class="flex-1 bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-800 px-6 py-4 focus:border-red-600 focus:outline-none dark:text-white transition-colors">
                    <button
                        class="bg-red-600 text-white px-8 py-4 font-black hover:bg-red-700 transition-colors uppercase">JOIN</button>
                </form>
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