
## **Using Docker Compose**

### **1. Create `docker-compose.yml`**
```yaml
version: '3.8'
services:
  nginx:
    image: nginx:latest
    container_name: nginx-server
    ports:
      - "80:80"
      - "81:81"
      - "82:82"
    volumes:
      - ./nginx.conf:/etc/nginx/nginx.conf
      - ./project1:/usr/share/nginx/project1
      - ./project2:/usr/share/nginx/project2
    restart: always
```

### **2. Run with Docker Compose**
Start the container with:
```bash
docker-compose up -d
```

---

## **Customizing**
- Update `nginx.conf` to change the configuration.
- Add or modify files in `project1` or `project2` directories to change the content.

---

## **Stopping and Removing the Container**

### **Stop the Container**
```bash
docker stop nginx-server
```

### **Remove the Container**
```bash
docker rm nginx-server
