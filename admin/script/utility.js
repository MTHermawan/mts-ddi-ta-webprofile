let selectedImageFile = null;

async function urlToFile(url, filename) {
    const response = await fetch(url);
    const blob = await response.blob();
    return new File([blob], filename, { type: blob.type });
}

async function IsUrlFound(url) {
    const checkerUrl = './post/utility/check_url.php';
    const encodedUrl = encodeURIComponent(url);
    const fullRequestUrl = `${checkerUrl}?url=${encodedUrl}`;

    try {
        const response = await fetch(fullRequestUrl, {
            method: 'GET',
            cache: 'no-cache'
        });

        if (response.ok) {
            const data = await response.json();
            return data.found === true;
        }

        return false;

    } catch (error) {
        console.warn("Network error during file check:", error.message);
        return false;
    }
}

async function MakeXMLRequest(method, url, formData = null) {
    return new Promise((resolve, reject) => {
        let xhr = new XMLHttpRequest();
        xhr.open(method, url);
        xhr.addEventListener('load', () => {
            if (xhr.status >= 200 && xhr.status < 300) {
                resolve(xhr.responseText);
            } else {
                reject({
                    status: xhr.status,
                    statusText: xhr.statusText,
                    responseText: JSON.parse(xhr.responseText)
                });
            }
        });

        xhr.onerror = () => {
            reject({
                status: xhr.status,
                statusText: xhr.statusText,
                responseText: JSON.parse(xhr.responseText)
            });
        };
        if (formData) {
            xhr.send(formData);
        }
        else {
            xhr.send();
        }
    });
}

async function handleResumeInput(remoteResumeURL) {

    const input = document.getElementById('imageInput');
    const dt = new DataTransfer();

    if (!input) {
        return console.error("Input image tidak ditemukan!");
    }

    if (Array.isArray(remoteResumeURL)) {
        for (const url of remoteResumeURL) {
            if (!url) continue;

            const designFile = await createImage(url);
            dt.items.add(designFile);
        }
    }
    else if (remoteResumeURL) {
        const designFile = await createImage(remoteResumeURL);
        dt.items.add(designFile);
    }
    if (!dt.items) return;
    input.files = dt.files;

    const event = new Event("change", {
        bubbles: !0,
    });
    input.dispatchEvent(event);
}

async function createImage(url) {
    let response = await fetch(url);
    let data = await response.blob();
    let metadata = {
        type: "image/*",
    };
    const filename = new URL(response['url']).pathname.split("/").pop();
    return new File([data], filename, metadata);
}