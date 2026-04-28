<?php 
    class DBClass {
        private string $server;
        private string $user;
        private string $pass;
        private string $dbname;
        
        // Использование ?mysqli позволяет быть переменной null
        private ?mysqli $db = null;
    

        public function __construct(string $server, string $user, string $pass, string $dbname) {
            $this->server = $server;
            $this->user = $user;
            $this->pass = $pass;
            $this->dbname = $dbname;
            $this->openConnection();
        }

        // метод подключения к бд
        public function openConnection(): bool {
            // обработка ошибок
            if ($this->db === null) {
                $this->db = new mysqli($this->server, $this->user, $this->pass, $this->dbname);

                if ($this->db->connect_error) {
                    // логирование ошибки подключения
                    error_log("Ошибка подключения к базе данных: " . $this->db->connect_error);
                }

                if (!$this->db->set_charset("utf8")) {
                    // логирование ошибки подключения
                    error_log("Ошибка установки кодировки utf8: " . $this->db->error);
                    return false;
                }
                return true;
            } else {
                return true;
            }
        }

        // метод запросов
        public function query(string $sql): mysqli_result|bool {
            if ($this->db === null) {
                error_log("Соединение с базой данных не установлено.");
                return false;
            }
            $result = $this->db->query($sql);

            // проверак запроса на ошибки
            if ($result === false) {
                error_log("Ошибка выполнения запроса: " . $this->db->error . " (SQL: " . $sql . ")");
                return false;
            }
            return $result; // возвращает результат запроса
        }

        // метод получения последней ошибки
        public function getLastError(): ?string {
            return $this->db ? $this->db->error : null;
        }

        // метод получения данных с защитой от SQL инъекций
        public function escapeString(string $string): string {
            if ($this->db === null) {
                error_log("Соединение с базой данных не установлено.");
                return $string;
            }
            return $this->db->real_escape_string($string);
        }

        // закрытие подключения
        public function closeConnection() :void {
            if ($this->db !== null) {
                $this->db->close();
                $this->db = null; // важно сбросить значение после закрытия
            }
        }

        public function __destruct() {
            $this->closeConnection();
        }

        // метод получения id
        public function getLastInsertId(): ?int {
            return $this->db ? $this->db->insert_id : null;
        }

        // метод получения affected_rows 
        public function getAffectedRows(): ?int {
            return $this->db ? $this->db->affected_rows : null;
        }
    }
?>