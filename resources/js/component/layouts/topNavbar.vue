<template>
  <nav
    class="navbar navbar-default navbar-fixed-top"
    role="navigation"
    id="default-navbar"
  >
    <div class="navbar-header">
      <button
        type="button"
        class="navbar-toggle"
        data-toggle="collapse"
        data-target="#navbar"
        aria-expanded="false"
        aria-controls="navbar"
      >
        <span class="fa fa-chevron-down"></span>
      </button>
      <button
        id="sidebar-toggle"
        type="button"
        class="navbar-toggle"
        data-target="#sidebar"
      >
        <span class="sr-only">Toggle navigation</span>
        <span class="fa fa-bars"></span>
      </button>

      <a class="navbar-brand" href="javascript:void(0)">
        <img
          class="dashboard-image"
          :src="getImage('assets/images/logo.png')"
        />
      </a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-left inline-block">
        <li v-if="hasNavbar" class="hidden-xs pl15 pr15 b-l">
          <button class="hidden-xs" id="sidebar-toggle-md">
            <span class="fa fa-dedent"></span>
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right inline-block">
        <li class="dropdown pr15 dropdown-user">
          <a
            id="user-dropdown-icon"
            href="javascript:void(0)"
            class="dropdown-toggle"
            data-toggle="dropdown"
            role="button"
            aria-expanded="false"
          >
            <span class="avatar-xs avatar pull-left mt-5 mr10">
              <img
                alt="..."
                :src="getImage('assets/images/avatar-bot.jpg')"
              /> </span
            ><span class="topbar-user-name">{{
              showData(Config.user, "name")
            }}</span>
            <span class="caret"></span
          ></a>
          <ul class="dropdown-menu p0" role="menu">
            <li v-if="hasNavbar" class="divider"></li>
            <li>
              <a href="/logout"
                ><i class="fa fa-power-off mr10"></i> Sign Out </a
              >
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!--/.nav-collapse -->
  </nav>
</template>

<script>
export default {
  name: "topNavbar",
  props: {
    hasNavbar: {
      type: Boolean,
      default: true,
    },
  },
  mounted() {
    //close navbar collapse panel on clicking outside of the panel
    $(document).click(function (e) {
      if (!$(e.target).is("#navbar") && isMobile()) {
        $("#navbar").collapse("hide");
      }
    });

    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });
  },
};
</script>
