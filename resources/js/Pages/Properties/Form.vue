<template>
    <div class="px-8 sm:px-6 lg:px-10">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Create Properties</h1>
                <p class="mt-2 text-sm text-gray-700">Create New Properties.</p>
            </div>
        </div>
        <form @submit.prevent="submitForm" class="space-y-8 divide-y divide-gray-200 mt-2">
            <div class="space-y-8 sm:space-y-5">
                <div class="space-y-6 sm:space-y-5">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="cover-photo" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Cover photo</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <div class="flex max-w-lg justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                                <span>Upload a file</span>
                                                <input id="file-upload" @input="form.image = $event.target.files[0]" name="file-upload" type="file" class="sr-only" accept="image/png, image/gif, image/jpeg"/>
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                    <div class="space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="first-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">County</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <input type="text" v-model="form.county" name="county" id="county" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm" />
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Country</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <input type="text" v-model="form.country" name="country" id="country" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm" />
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Town</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <input type="text" v-model="form.town" name="town" id="town" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm" />
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="last-name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Postcode</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <input type="text" v-model="form.postcode" name="postcode" id="postcode" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm" />
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Description</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <textarea id="about" name="description" v-model="form.description" rows="3" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                <p class="mt-2 text-sm text-gray-500">Write a few sentences about property.</p>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="about" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Displayable Address</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <textarea id="address" name="address" v-model="form.address" rows="3" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                <p class="mt-2 text-sm text-gray-500">Write an Address.</p>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">No. Of Bedrooms</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <select id="num_bedrooms" name="num_bedrooms" v-model="form.num_bedrooms" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="country" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">No. Of Bathrooms</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <select id="num_bathrooms" name="num_bathrooms" v-model="form.num_bathrooms" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="price" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Price</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <input type="text" name="price" id="price" v-model="form.price" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm" />
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="property_type_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Property Type</label>
                            <div class="mt-1 sm:col-span-2 sm:mt-0">
                                <select id="property_type_id" name="property_type_id" v-model="form.property_type_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4 sm:border-t sm:border-gray-200">
                            <div>
                                <div class="text-base font-medium text-gray-900 sm:text-sm sm:text-gray-700" id="label-notifications">For Sale / For Rent</div>
                            </div>
                            <div class="sm:col-span-2">
                                <div class="max-w-lg">
                                    <div class="mt-4 space-y-4">
                                        <div class="flex items-center">
                                            <input id="sale" name="type" v-model="form.type" type="radio" value="sale" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="sale" class="ml-3 block text-sm font-medium text-gray-700">Sale</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input id="rent" name="type" v-model="form.type" type="radio" value="rent" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                                            <label for="rent" class="ml-3 block text-sm font-medium text-gray-700">Rent</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
import Layout from './../Layout.vue'
import {ref} from "vue";
import { useForm } from '@inertiajs/inertia-vue3'
export default {
    layout: Layout,

    setup() {
        const form = useForm({
            county: '',
            country: '',
            town: '',
            postcode: '',
            description: '',
            address: '',
            num_bedrooms:'',
            num_bathrooms:'',
            image:'',
            image_full: '',
            image_thumbnail: '',
            price: '',
            property_type_id: '',
            type: '',
        })

        const submitForm = () => {
            form.post(route('properties.store'))
        }

        return {form, submitForm}
    }
}
</script>
