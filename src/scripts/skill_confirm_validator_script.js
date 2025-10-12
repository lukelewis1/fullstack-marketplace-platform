// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->
// effectively a cron job for checking for if skills have been successful or not
setInterval(() => {
    fetch('/inc/skill_confirm_validator.php', { cache: 'no-store' });
}, 1000);