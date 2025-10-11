// <!-- Authored by Oliver Wuttke, FAN WUTT0019, Edited by (Oliver Wuttke, FAN WUTT0019) -->

const bookerPage = "skill_bookings.php";
const providerPage = "my_skills.php";

document.addEventListener("DOMContentLoaded", () => {
    const calendar = document.getElementById("calendar");
    const today = new Date();
    const year = today.getFullYear();
    const month = today.getMonth();

    const firstDay = new Date(year, month, 1);
    const lastDay = new Date(year, month + 1, 0);
    const startDay = firstDay.getDay(); // 0=Sun
    const daysInMonth = lastDay.getDate();

    // Create 7-column grid
    calendar.style.display = "grid";
    calendar.style.gridTemplateColumns = "repeat(7, 1fr)";
    calendar.style.gap = "5px";

    // Headers
    ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"].forEach(d => {
        const head = document.createElement("div");
        head.textContent = d;
        head.className = "header";
        calendar.appendChild(head);
    });

    // Empty cells before month start
    for (let i = 0; i < startDay; i++) {
        const empty = document.createElement("div");
        empty.className = "empty";
        calendar.appendChild(empty);
    }

    // Day cells
    for (let day = 1; day <= daysInMonth; day++) {
        const cell = document.createElement("div");
        cell.className = "day";
        cell.textContent = day;

        const dateStr = new Date(year, month, day).toISOString().split("T")[0];

        // Match bookings to this day
        bookings.forEach(b => {
            const startDate = b.start.split(" ")[0];
            if (startDate === dateStr) {
                const isBooker = b.booker_id == uid;
                const confirmed = b.status === "confirmed";

                const link = document.createElement("a");
                link.href = isBooker
                    ? `${bookerPage}?bid=${b.booking_id}`
                    : `${providerPage}?bid=${b.booking_id}`;
                link.className = "booking-link";

                const badge = document.createElement("div");
                badge.className = "booking-badge";
                badge.style.background = isBooker
                    ? (confirmed ? "#0047AB" : "#1E90FF")
                    : (confirmed ? "#006400" : "#2E8B57")
                badge.textContent = isBooker ? "Booked" : "Providing";

                link.appendChild(badge);
                cell.appendChild(link);
            }
        });

        calendar.appendChild(cell);
    }
});