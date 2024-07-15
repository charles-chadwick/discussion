<template>
  <div class="font-semibold text-sm text-lime-600">
    {{ user.full_name }}
    {{ user.created_at_diff }}
  </div>
</template>
<script>
export default {
  name: 'UserDetails',
  props: {
    user: {}
  }
}
</script>
