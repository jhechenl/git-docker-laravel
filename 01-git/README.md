
# 📚 Ejercicios Prácticos de Git

Este documento contiene una serie de ejercicios prácticos para aprender y dominar Git, desde nivel básico hasta intermedio/avanzado.

---

## 🟢 Nivel Básico

### 1. Crear tu primer repositorio
**Objetivo:** Familiarizarse con `git init` y el flujo básico.
```bash
mkdir mi-proyecto && cd mi-proyecto
git init
echo "Hola Git" > readme.md
git add readme.md
git commit -m "feat: agrega readme inicial"
git log --oneline
```

---

### 2. Ignorar archivos innecesarios
**Objetivo:** Usar `.gitignore`.
```bash
echo "secreto.txt" > secreto.txt
echo "secreto.txt" > .gitignore
git add .
git commit -m "chore: agrega .gitignore para secreto.txt"
```

---

### 3. Inspección de cambios
**Objetivo:** Entender `git status`, `git diff` y `git log`.
```bash
echo "Nueva línea" >> readme.md
git status
git diff
git add readme.md
git commit -m "docs: agrega nueva línea a readme"
git log --oneline --graph
```

---

## 🟡 Nivel Intermedio

### 4. Crear y fusionar ramas
**Objetivo:** Practicar `branch`, `switch` y `merge`.
```bash
git switch -c feature/login
echo "Funcionalidad login" > login.txt
git add login.txt
git commit -m "feat: agrega login"

git switch main
git merge feature/login
```

---

### 5. Crear un conflicto y resolverlo
**Objetivo:** Aprender a resolver conflictos.
```bash
git switch -c rama-A
echo "Cambio desde rama-A" > conflicto.txt
git add .
git commit -m "feat: cambio en rama-A"

git switch main
git switch -c rama-B
echo "Cambio desde rama-B" > conflicto.txt
git add .
git commit -m "feat: cambio en rama-B"

git switch main
git merge rama-A
git merge rama-B   # Aquí habrá conflicto
```

Resolver conflicto en el archivo → luego:
```bash
git add conflicto.txt
git commit -m "fix: resuelve conflicto"
```

---

### 6. Rebase y limpieza del historial
**Objetivo:** Reordenar commits.
```bash
git switch -c feature/perfil
echo "Perfil usuario" > perfil.txt
git commit -am "feat: perfil usuario"
echo "Mejoras en perfil" >> perfil.txt
git commit -am "fix: mejora perfil"
git rebase -i main
```

---

### 7. Stash para trabajo temporal
**Objetivo:** Guardar cambios sin commit.
```bash
echo "Avance rápido" > temporal.txt
git add temporal.txt
git stash save "avance en temporal"
git stash list
git stash pop
```

---

### 8. Uso de tags
**Objetivo:** Marcar versiones.
```bash
git tag -a v1.0 -m "Versión estable 1.0"
git tag
```

---

## 🔵 Nivel Avanzado

### 9. Deshacer cambios
**Objetivo:** Usar `restore`, `reset`, `revert` y `reflog`.
```bash
echo "Error en código" > bug.txt
git add .
git commit -m "feat: introduce bug"
git revert HEAD       # Revertir commit sin borrar historial
```

---

### 10. Trabajo colaborativo (simulación local)
**Objetivo:** Simular un remoto con dos clones.
```bash
# Crear repo “central”
mkdir central && cd central
git init --bare

# Clonar en 2 carpetas diferentes
cd ..
git clone ./central dev1
git clone ./central dev2
```

En `dev1`:
```bash
echo "Cambios dev1" > file.txt
git add file.txt
git commit -m "feat: cambios dev1"
git push origin main
```

En `dev2`:
```bash
git pull origin main
cat file.txt
```

---

# 📝 Retos Extras
1. Hacer un commit y luego modificar el mensaje (`git commit --amend`).  
2. Crear un alias (`git config --global alias.lg "log --oneline --graph --all"`).  
3. Probar `git bisect` para encontrar un commit con un bug.  
