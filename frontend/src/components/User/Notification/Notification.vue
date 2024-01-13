<!-- Notification.vue -->
<template>
  <div v-if="show" class="notification" :class="type">
    {{ message }}
  </div>
</template>
  
  <script>
export default {
  name: "NotificationPopup",
  props: {
    show: Boolean,
    type: String,
    message: String,
  },
};
</script>
  
  <style scoped>
.notification {
  position: fixed;
  top: 0;
  right: 0;
  padding: 1rem;
  margin: 1rem;
  border-radius: 4px;
  color: #fff;
  font-weight: bold;
  z-index: 1000;
}

.success {
  background-color: #4caf50;
}

.error {
  background-color: #f44336;
}
</style>