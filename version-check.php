<!-- 🔄 Loader Overlay -->
  <div id="loader-overlay">
    <div class="spinner"></div>
  </div>


<style>
    /* 🔄 Loader Overlay */
    #loader-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(255, 255, 255, 0.9);
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }

    .spinner {
      border: 6px solid #ddd;
      border-top: 6px solid #007bff;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }
</style>



<script>
    const versionKey = 'html_version';

fetch('version.txt?t=' + new Date().getTime())
  .then(res => res.text())
  .then(serverVersion => {
    const newVersion = serverVersion.trim();
    const savedVersion = localStorage.getItem(versionKey);

    if (savedVersion !== newVersion) {
      localStorage.setItem(versionKey, newVersion);
      location.reload(true); // 🔄 Reload with cache bypass
    } else {
      // 🟢 Hide loader if version is same
      const loader = document.getElementById('loader-overlay');
      if (loader) loader.style.display = 'none';
    }
  })
  .catch(err => {
    console.error("Version check failed:", err);
    // Still hide loader even on error
    const loader = document.getElementById('loader-overlay');
    if (loader) loader.style.display = 'none';
  });

  </script>