using OpenQA.Selenium.Chrome;
using OpenQA.Selenium.Support.UI;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace FridgeFusionSeleniumTests
{
    [TestClass]
    public class RegisterTests
    {
        private ChromeDriver chromeDriver;

        [TestInitialize]
        public void Initialize()
        {
            chromeDriver = new ChromeDriver();
            chromeDriver.Manage().Window.Maximize();
            chromeDriver.Navigate().GoToUrl("http://localhost:8881/#/register");
        }
        [TestCleanup]
        public void TearDown()
        {
            chromeDriver.Quit();
        }
        [TestMethod]
        public void RegisterUser()
        {
            IWebElement usernameInput = chromeDriver.FindElement(By.Name("username"));
            usernameInput.SendKeys("Aplle12");

            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("alma@alma.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("Alma123");

            IWebElement passwordConfInput = chromeDriver.FindElement(By.Name("password_confirmation"));
            passwordConfInput.SendKeys("Alma123");

            IWebElement registerButton = chromeDriver.FindElement(By.CssSelector("input[type=submit]"));
            registerButton.Click();

            Thread.Sleep(6000);

            Assert.AreEqual("http://localhost:8881/#/login", chromeDriver.Url);
        }
        [TestMethod]
        public void TestRegisterWithBadUsername ()
        {
            IWebElement usernameInput = chromeDriver.FindElement(By.Name("username"));
            usernameInput.SendKeys("App");

            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("alma@alma.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("Alma123");

            IWebElement passwordConfInput = chromeDriver.FindElement(By.Name("password_confirmation"));
            passwordConfInput.SendKeys("Alma123");

            IWebElement registerButton = chromeDriver.FindElement(By.CssSelector("input[type=submit]"));
            registerButton.Click();
            
            Assert.AreEqual("username must be at least 6 characters", chromeDriver.FindElement(By.Id("error-username")).Text);
        }
        [TestMethod]
        public void TestRegisterWithBadEmail()
        {
            IWebElement usernameInput = chromeDriver.FindElement(By.Name("username"));
            usernameInput.SendKeys("Alma73");

            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("alma22.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("Alma123");

            IWebElement passwordConfInput = chromeDriver.FindElement(By.Name("password_confirmation"));
            passwordConfInput.SendKeys("Alma123");

            IWebElement registerButton = chromeDriver.FindElement(By.CssSelector("input[type=submit]"));
            registerButton.Click();
            
            Assert.AreEqual("email must be a valid email", chromeDriver.FindElement(By.Id("error-email")).Text);
        }
        [TestMethod]
        public void TestRegisterWithBadPassword()
        {
            IWebElement usernameInput = chromeDriver.FindElement(By.Name("username"));
            usernameInput.SendKeys("Alma73");

            IWebElement emailInput = chromeDriver.FindElement(By.Name("email"));
            emailInput.SendKeys("alma22.hu");

            IWebElement passwordInput = chromeDriver.FindElement(By.Name("password"));
            passwordInput.SendKeys("alma123");

            IWebElement passwordConfInput = chromeDriver.FindElement(By.Name("password_confirmation"));
            passwordConfInput.SendKeys("alma123");

            IWebElement registerButton = chromeDriver.FindElement(By.CssSelector("input[type=submit]"));
            registerButton.Click();
            
            Assert.AreEqual("password must be at least 6 characters", chromeDriver.FindElement(By.Id("error-password")).Text);
        }
    }
}
