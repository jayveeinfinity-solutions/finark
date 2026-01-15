<script setup>
    const submit = () => {
        console.log("Creating thread...");
    }
    
    defineExpose({
        submit
    })
</script>

<template>
    <div class="p-6 md:p-8 space-y-8">
        <div class="space-y-1.5">
            <label class="block text-sm font-semibold text-slate-700" for="title">Post Title</label>
            <input class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm h-11 transition-shadow placeholder:text-slate-400" id="title" placeholder="e.g. Market Analysis Q3 2024" type="text"/>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1.5">
                <label class="block text-sm font-semibold text-slate-700" for="category">Category</label>
                <div class="relative">
                    <select class="block w-full rounded-lg border-slate-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm h-11 appearance-none bg-white" id="category">
                        <option>Market Analysis</option>
                        <option>Client Strategy</option>
                        <option>Regulatory Update</option>
                        <option>Internal Announcement</option>
                    </select>
                </div>
            </div>
            <div class="space-y-1.5">
            <label class="block text-sm font-semibold text-slate-700" for="tags">Tags</label>
            <div class="flex items-center w-full rounded-lg border border-slate-300 bg-white shadow-sm focus-within:border-primary focus-within:ring-1 focus-within:ring-primary h-11 px-3">
                <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded bg-blue-50 text-blue-700 text-xs font-semibold mr-2">
                    #Stocks
                    <button class="hover:text-blue-900"><span class="material-symbols-outlined text-[14px]">close</span></button>
                </span>
                <input class="block w-full border-0 p-0 text-sm focus:ring-0 placeholder:text-slate-400" id="tags" placeholder="Add tags..." type="text"/>
            </div>
            </div>
        </div>
        <div class="space-y-1.5">
            <label class="block text-sm font-semibold text-slate-700">Content</label>
            <div class="w-full rounded-lg border border-slate-300 bg-white shadow-sm overflow-hidden group focus-within:border-primary focus-within:ring-1 focus-within:ring-primary transition-all">
                <div class="flex flex-wrap items-center gap-1 border-b border-slate-200 bg-slate-50 p-2">
                    <div class="flex items-center bg-white border border-slate-200 rounded-md shadow-sm">
                        <button class="p-1.5 text-slate-600 hover:text-primary hover:bg-slate-50 rounded-l-md transition-colors" title="Bold" type="button">
                            <span class="material-symbols-outlined text-[18px]">format_bold</span>
                        </button>
                        <div class="w-px h-4 bg-slate-200"></div>
                        <button class="p-1.5 text-slate-600 hover:text-primary hover:bg-slate-50 transition-colors" title="Italic" type="button">
                            <span class="material-symbols-outlined text-[18px]">format_italic</span>
                        </button>
                        <div class="w-px h-4 bg-slate-200"></div>
                        <button class="p-1.5 text-slate-600 hover:text-primary hover:bg-slate-50 rounded-r-md transition-colors" title="Underline" type="button">
                            <span class="material-symbols-outlined text-[18px]">format_underlined</span>
                        </button>
                    </div>
                    <div class="w-px h-6 bg-slate-300 mx-2"></div>
                    <div class="flex items-center bg-white border border-slate-200 rounded-md shadow-sm">
                        <button class="p-1.5 text-slate-600 hover:text-primary hover:bg-slate-50 rounded-l-md transition-colors" title="Bullet List" type="button">
                            <span class="material-symbols-outlined text-[18px]">format_list_bulleted</span>
                        </button>
                        <div class="w-px h-4 bg-slate-200"></div>
                        <button class="p-1.5 text-slate-600 hover:text-primary hover:bg-slate-50 rounded-r-md transition-colors" title="Numbered List" type="button">
                            <span class="material-symbols-outlined text-[18px]">format_list_numbered</span>
                        </button>
                    </div>
                    <div class="w-px h-6 bg-slate-300 mx-2"></div>
                    <button class="p-1.5 text-slate-600 hover:text-primary hover:bg-slate-100 rounded-md transition-colors" title="Insert Link" type="button">
                        <span class="material-symbols-outlined text-[20px]">link</span>
                    </button>
                    <button class="p-1.5 text-slate-600 hover:text-primary hover:bg-slate-100 rounded-md transition-colors" title="Insert Image" type="button">
                        <span class="material-symbols-outlined text-[20px]">image</span>
                    </button>
                    <button class="ml-auto p-1.5 text-slate-400 hover:text-slate-600" title="Full Screen" type="button">
                        <span class="material-symbols-outlined text-[20px]">open_in_full</span>
                    </button>
                </div>
                <textarea class="w-full border-0 bg-transparent p-4 text-slate-900 placeholder:text-slate-400 focus:ring-0 sm:text-sm leading-relaxed resize-y min-h-[240px]" placeholder="Start typing your post here..."></textarea>
                <div class="flex justify-between items-center px-4 py-2 bg-slate-50 border-t border-slate-100 text-xs text-slate-500">
                    <span>Markdown supported</span>
                    <span>0 characters</span>
                </div>
            </div>
        </div>
        <div class="space-y-1.5">
            <label class="block text-sm font-semibold text-slate-700">Attachments</label>
            <div class="mt-1 flex justify-center rounded-lg border-2 border-dashed border-slate-300 px-6 py-8 hover:border-primary hover:bg-primary/5 transition-all cursor-pointer group">
                <div class="text-center">
                    <div class="mx-auto h-12 w-12 text-slate-300 group-hover:text-primary transition-colors">
                        <span class="material-symbols-outlined text-[48px]">cloud_upload</span>
                    </div>
                    <div class="mt-4 flex text-sm leading-6 text-slate-600 justify-center">
                        <label class="relative cursor-pointer rounded-md bg-transparent font-semibold text-primary focus-within:outline-none focus-within:ring-2 focus-within:ring-primary focus-within:ring-offset-2 hover:text-primary-dark" for="file-upload">
                            <span>Upload a file</span>
                            <input class="sr-only" id="file-upload" name="file-upload" type="file"/>
                        </label>
                        <p class="pl-1">or drag and drop</p>
                    </div>
                    <p class="text-xs leading-5 text-slate-500">PDF, PNG, JPG up to 10MB</p>
                </div>
            </div>
        </div>
    </div>
</template>