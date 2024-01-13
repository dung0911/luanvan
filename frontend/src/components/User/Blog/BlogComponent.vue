<template>
  <article
    class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700"
  >
    <div  @click="showBlogDetail(blogData.id, blogData.slug)">
      <img class="rounded-lg mb-2 h-64 w-full cursor-pointer" :src="fullImagePath" alt="" />
    </div>
    <div class="flex justify-between items-center text-gray-500">
      <span
        class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800"
      >
        {{ blogData.added_by }}
      </span>
      <span class="text-sm">{{ blogData.created_at }}</span>
    </div>
    <h2
      class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white cursor-pointer"
    >
      <div  @click="showBlogDetail(blogData.id, blogData.slug)">{{ blogData.title }}</div>
    </h2>
    <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
      {{ limitContent(blogData.content, 100) }}
    </p>
    <div class="flex justify-between items-center mb-3">
      <div class="flex items-center space-x-4">
        <!-- <span class="font-medium dark:text-white"> {{ blogData.added_by }} </span> -->
      </div>
      <div
        @click="showBlogDetail(blogData.id, blogData.slug)"
        class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline cursor-pointer"
      >
        Read more
        <svg
          class="ml-2 w-4 h-4"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </div>
    </div>
  </article>
</template>

<script>
export default {
  name: "BlogComponent",
  props: {
    blogData: Object,
  },
  data() {
    return {
      pages: [],
    };
  },
  methods: {
    limitContent(content, limit) {
      if (content && content.length > limit) {
        return content.substring(0, limit) + "...";
      } else {
        return content;
      }
    },
    showBlogDetail(blogID, slug) {
      this.$router.push(`/singlePage/${blogID}-${slug}`);
    },
  },
  computed: {
    fullImagePath() {
      const baseUrl = "https://shopluanvan.x10.mx//uploads/";
      return baseUrl + this.blogData.photo;
    },
  },
};
</script>

<style>
</style>