// Sidebar Toggle
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    const main = document.getElementById("mainContent");
    sidebar.classList.toggle("sidebar-collapsed");
    main.classList.toggle("ml-64");
    main.classList.toggle("ml-20");
}

// Progress Bar Animation
setTimeout(() => {
    document.querySelectorAll(".progress-bar").forEach((bar) => {
        bar.style.width = bar.getAttribute("data-width");
    });
}, 500);

// Revenue Chart
const revenueCtx = document.getElementById("revenueChart").getContext("2d");
const revenueGradient = revenueCtx.createLinearGradient(0, 0, 0, 200);
revenueGradient.addColorStop(0, "rgba(99, 102, 241, 0.3)");
revenueGradient.addColorStop(1, "rgba(99, 102, 241, 0)");

new Chart(revenueCtx, {
    type: "line",
    data: {
        labels: [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "Jun",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ],
        datasets: [
            {
                label: "Revenue",
                data: [
                    30000, 45000, 28000, 52000, 38000, 61000, 45000, 73000,
                    55000, 68000, 82000, 95000,
                ],
                borderColor: "#6366f1",
                backgroundColor: revenueGradient,
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 0,
                pointHoverRadius: 6,
                pointHoverBackgroundColor: "#6366f1",
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 2,
            },
            {
                label: "Expenses",
                data: [
                    25000, 35000, 30000, 42000, 35000, 48000, 42000, 58000,
                    48000, 55000, 68000, 78000,
                ],
                borderColor: "#8b5cf6",
                borderWidth: 3,
                fill: false,
                tension: 0.4,
                pointRadius: 0,
                pointHoverRadius: 6,
                pointHoverBackgroundColor: "#8b5cf6",
                pointHoverBorderColor: "#fff",
                pointHoverBorderWidth: 2,
            },
        ],
    },
    options: {
        responsive: true,
        interaction: {
            mode: "index",
            intersect: false,
        },
        plugins: {
            legend: {
                display: true,
                position: "top",
                labels: {
                    color: "rgba(255,255,255,0.5)",
                    usePointStyle: true,
                    pointStyle: "circle",
                    padding: 20,
                    font: {
                        size: 12,
                        family: "Inter",
                    },
                },
            },
            tooltip: {
                backgroundColor: "rgba(15,10,46,0.9)",
                borderColor: "rgba(99,102,241,0.3)",
                borderWidth: 1,
                padding: 12,
                titleColor: "#fff",
                bodyColor: "rgba(255,255,255,0.7)",
                titleFont: {
                    family: "Inter",
                    weight: "600",
                },
                bodyFont: {
                    family: "Inter",
                },
                cornerRadius: 12,
            },
        },
        scales: {
            x: {
                grid: {
                    color: "rgba(255,255,255,0.05)",
                    drawBorder: false,
                },
                ticks: {
                    color: "rgba(255,255,255,0.3)",
                    font: {
                        size: 11,
                        family: "Inter",
                    },
                },
            },
            y: {
                grid: {
                    color: "rgba(255,255,255,0.05)",
                    drawBorder: false,
                },
                ticks: {
                    color: "rgba(255,255,255,0.3)",
                    font: {
                        size: 11,
                        family: "Inter",
                    },
                    callback: (value) => "$" + value / 1000 + "K",
                },
            },
        },
    },
});

// Traffic Doughnut Chart
const trafficCtx = document.getElementById("trafficChart").getContext("2d");
new Chart(trafficCtx, {
    type: "doughnut",
    data: {
        labels: ["Organic", "Direct", "Referral", "Social"],
        datasets: [
            {
                data: [42, 28, 18, 12],
                backgroundColor: ["#6366f1", "#a855f7", "#06b6d4", "#f59e0b"],
                borderWidth: 0,
                hoverOffset: 8,
            },
        ],
    },
    options: {
        responsive: true,
        cutout: "70%",
        plugins: {
            legend: {
                display: false,
            },
            tooltip: {
                backgroundColor: "rgba(15,10,46,0.9)",
                borderColor: "rgba(99,102,241,0.3)",
                borderWidth: 1,
                padding: 12,
                titleColor: "#fff",
                bodyColor: "rgba(255,255,255,0.7)",
                cornerRadius: 10,
            },
        },
    },
});

// Add Task
function addTask() {
    const taskList = document.getElementById("taskList");
    const newTask = document.createElement("div");
    newTask.className =
        "flex items-center gap-3 p-3 bg-white/5 rounded-xl task-item animate-fade-in";
    newTask.innerHTML = `
                <input type="checkbox" class="w-4 h-4 rounded accent-primary">
                <input type="text" placeholder="New task..." class="bg-transparent text-sm flex-1 focus:outline-none text-white/80 placeholder:text-white/30" autofocus>
                <span class="text-xs text-primary">Later</span>
            `;
    taskList.prepend(newTask);
    newTask.querySelector('input[type="text"]').focus();
}

// Counter Animation
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target.toLocaleString();
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start).toLocaleString();
        }
    }, 16);
}

// Intersection Observer for animations
const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = "1";
                entry.target.style.transform = "translateY(0)";
            }
        });
    },
    {
        threshold: 0.1,
    },
);

document.querySelectorAll(".animate-fade-up").forEach((el) => {
    observer.observe(el);
});
