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

    } catch(error) {
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
                    statusText: xhr.statusText
                });
            }
        });
        xhr.onerror = function () {
            reject({
                status: xhr.status,
                statusText: xhr.statusText
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
