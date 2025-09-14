const BASE = 'http://127.0.0.1:8000/api'; // change host if needed (emulator vs device)

async function request(path, options = {}) {
  const headers = options.headers || {};
  if (global.apiToken) {
    headers['Authorization'] = `Bearer ${global.apiToken}`;
  }
  headers['Accept'] = 'application/json';
  options.headers = headers;
  const res = await fetch(BASE + path, {
    ...options,
  });
  const text = await res.text();
  let data = text ? JSON.parse(text) : null;
  if (!res.ok) throw data || {message:'Error'};
  return data;
}

export default {
  get: (p) => request(p, { method:'GET' }),
  post: (p, body) => request(p, { method:'POST', body: JSON.stringify(body), headers: {'Content-Type':'application/json'} }),
  put: (p, body) => request(p, { method:'PUT', body: JSON.stringify(body), headers: {'Content-Type':'application/json'} }),
  delete: (p) => request(p, { method:'DELETE' }),
};
