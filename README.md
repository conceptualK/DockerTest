
## **Using Docker Compose**



### ** Run with Docker Compose**
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
